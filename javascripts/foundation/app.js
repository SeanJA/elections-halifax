/*global jQuery:true, $:true, google:true, polling_stations:true, districts:true, app:true*/
/*jslint browser: true, white: true, vars: true, bitwise: true, debug: true, nomen: true, sloppy: false, indent: 4*/

window.app = window.app || (function () {
    "use strict";
    var geocoder = null,
        map = null,
        markersArray = [],
        tooltip = null,
        loadedDistrict = null,
        clearMarkers = function () {
            if (markersArray) {
                for (var i = 0; i < markersArray.length; i++) {
                    markersArray[i].setMap(null);
                }
            }
            markersArray = [];
        },
        loadData = function (location) {
            $.ajax({
                type: "GET",
                url: "get-district.php",
                data: {
                    'long': location.Ya,
                    'lat': location.Xa
                },
                dataType: "json"
            }).done(function (key) {
                addPollingStations(polling_stations[key]);
                addDistrictData(districts[key]);
                loadedDistrict = key;
            });
        },
        listenMarker = function (marker, info) {
            google.maps.event.addListener(marker, 'click', function () {
                if (tooltip) {
                    tooltip.close();
                }
                tooltip = new google.maps.InfoWindow({
                    content: info
                });
                tooltip.open(map, marker);
            });
        },
        addPollingStations = function (data) {
            for (var i in data) {
                var pos = data[i];
                if (pos) {
                    var location = new google.maps.LatLng(pos.lat, pos.long);
                    var info = '<b>' + pos.place_name + '</b>' + '<p>' + pos.address + ', ' + pos.city + '</p>';
                    var marker = new google.maps.Marker({
                        map: map,
                        position: location,
                        title: pos.place_name,
                        icon: 'images/administration.png',
                        animation: google.maps.Animation.DROP
                    });
                    listenMarker(marker, info);
                    markersArray.push(marker);
                }
            }
        },
        addDistrictData = function (data) {
            if (data) {
                var string = '';
                string += '<h5>' + data.district + ': ' + data.name + '</h5>';
                string += '<h6>Voters: ' + data.voters + '</h6>';
                string += '<h6> Candidates: </h6>';

                for (var i in data.candidates) {
                    if (typeof data.candidates[i] !== 'undefined') {
                        var cdt = data.candidates[i];
                        string += '<h6>' + cdt.name + '</h6>';
                        string += '<div>';
                        if (cdt.site !== '') {
                            string += '<a class="fc-webicon rss" title="Candidate\'s website" target="_blank" href="' + cdt.site + '">' + cdt.site + '</a>';
                        }
                        if (cdt.twitter !== '') {
                            string += '<a class="fc-webicon twitter" title="Twitter Account" target="_blank" href="https://twitter.com/' + cdt.twitter + '">' + cdt.twitter + '</a>';
                        }
                        if (cdt.email !== '') {
                            string += '<a class="fc-webicon mail" title="Send an email" target="_blank" href="mailto:' + cdt.email + '">' + cdt.email + '</a>';
                        }
                        if (cdt.facebook !== '') {
                            string += '<a class="fc-webicon facebook" title="Facebook page" target="_blank" href="https://facebook.com/' + cdt.facebook + '">' + cdt.facebook + '</a>';
                        }
                        if (cdt.herald !== '') {
                            string += '<a class="fc-webicon herald" title="Profile On The Chronicle Herald" target="_blank" href="http://thechronicleherald.ca/municipal2012/candidate/' + cdt.herald + '">http://thechronicleherald.ca/municipal2012/candidate/' + cdt.herald + '</a>';
                        }
                        string += '<hr />';
                        string += '</div>';
                    }
                }
                $('#district-data').html(string).addClass('panel');
            }
        };
    return {
        initialize: function () {
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(44.653024, -63.597107);
            var mapOptions = {
                zoom: 11,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            var layer = new google.maps.FusionTablesLayer({
                query: {
                    select: 'col2',
                    from: '1QKmWKHvGOcq4qzKAokl4FhyMcaf1Oqug2iDxtxc'
                }
            });

            layer.setMap(map);

            google.maps.event.addListener(layer, 'click', function (event) {
                clearMarkers();
                loadData(event.latLng);
            });
        },
        //code an address (the one that is in the postal code box)
        codeAddress: function () {
            $('.googft-info-window').parent().parent().parent().parent().find('div > img').click();
            $('#district-data').html('').removeClass('panel');
            clearMarkers();
            var address = $('#postal-code').val() + ' Nova Scotia, Canada';
            geocoder.geocode({
                'address': address
            }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                        icon: 'images/house.png',
                        animation: google.maps.Animation.b
                    });
                    markersArray.push(marker);
                    loadData(results[0].geometry.location);

                    window.location.hash = "map-canvas";
                } else {
                    $('#district-data').html('Geocode was not successful for the following reason: ' + status).addClass('panel');
                }
            });
        }
    };
})();

(function ($) {

    $(function () {
        $(document).foundationNavigation();
        app.initialize();
        $('#find-it').click(function () {
            app.codeAddress();
        });
        $('#postal-code').keypress(function (e) {
            if (e.keyCode === 13 || e.which === 13) {
                app.codeAddress();
            }
        });
    });

})(jQuery);