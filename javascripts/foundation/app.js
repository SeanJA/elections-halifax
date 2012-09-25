var geocoder;
var map;
var markersArray = [];
var tooltip = null;
var loadedDistrict = null;


function clearMarkers() {
    if (markersArray) {
        for (var i = 0; i < markersArray.length; i++) {
            markersArray[i].setMap(null);
        }
    }
    markersArray = [];
}



function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(44.653024, -63.597107);
    var mapOptions = {
        zoom: 11,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    var layer = new google.maps.FusionTablesLayer({
        query: {
            select: 'col2',
            from: '1QKmWKHvGOcq4qzKAokl4FhyMcaf1Oqug2iDxtxc'
        }
    });

    layer.setMap(map);

    google.maps.event.addListener(layer, 'click', function(event) {
        clearMarkers();
        loadData(event.latLng);
    });
}

function codeAddress() {
    var address = document.getElementById('postal-code').value + ' Nova Scotia, Canada';
    geocoder.geocode({
        'address': address
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
                icon: 'images/house.png'
            });
            markersArray.push(marker);
            loadData(results[0].geometry.location);
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}

function loadData(location) {
    $.ajax({
        type: "GET",
        url: "get-district.php",
        data: {
            'long': location.Ya,
            'lat': location.Xa
        },
        dataType: "json"
    }).done(function(key) {
        addPollingStations(polling_stations[key]);
        addDistrictData(districts[key]);
        loadedDistrict = key;
    });
}

function addPollingStations(data) {
    for (i in data) {
        var pos = data[i];
        if (pos) {
            var location = new google.maps.LatLng(pos['lat'], pos['long']);
            var info = '<b>' + pos['place_name'] + '</b>' + '<p>' + pos['address'] + ', ' + pos['city'] + '</p>';
            var marker = new google.maps.Marker({
                map: map,
                position: location,
                title: pos['place_name'],
                icon: 'images/administration.png'
            });
            listenMarker(marker, info);
            markersArray.push(marker);
        }
    }
}

function addDistrictData(data) {
    if (data) {
        string = '';
        string += '<h5>' + data.district + ': ' + data.name + '</h5>';
        string += '<h6>Voters: ' + data.voters + '</h6>';
        string += '<h6> Candidates: </h6>';

        for (i in data['candidates']) {
            if (typeof data['candidates'][i] !== 'undefined') {
                var cdt = data['candidates'][i];
                string += '<h6>' + cdt.name + '</h6>';
                string += '<div>';
                if (cdt.site !== '') {
                    string += '<a class="fc-webicon rss" target="_blank" href="' + cdt.site + '">' + cdt.site + '</a>';
                }
                if (cdt.twitter !== '') {
                    string += '<a class="fc-webicon twitter" target="_blank" href="https://twitter.com/' + cdt.twitter + '">' + cdt.twitter + '</a>';
                }
                if (cdt.email !== '') {
                    string += '<a class="fc-webicon mail" target="_blank" href="mailto:' + cdt.email + '">' + cdt.email + '</a>';
                }
                if(cdt.facebook !== ''){
                    string += '<a class="fc-webicon facebook" target="_blank" href="' + cdt.facebook + '">' + cdt.facebook + '</a>';
                }
                string += '<hr />'
                string += '</div>';
            }
        }
        $('#district-data').html(string).addClass('panel');
    }
}

function listenMarker(marker, info) {

    google.maps.event.addListener(marker, 'click', function(data) {
        if (tooltip) {
            tooltip.close();
        }
        tooltip = new google.maps.InfoWindow({
            content: info
        });
        tooltip.open(map, marker);

    });
    //toolTipsArray[tooltip];
}



(function($) {

    $(function() {
        $(document).foundationNavigation();
        initialize();
        $('#find-it').click(function() {
            $('#district-data').html('').removeClass('panel');
            clearMarkers();
            codeAddress();
            window.location.hash = "map-canvas";
        });
    });

})(jQuery);


//http://localhost/elections-halifax/get-district.php?long=