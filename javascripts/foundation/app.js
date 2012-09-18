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
            from: '1gaFfc1uY9wbu7M_W-WOol1zvXLO3mVOCIawbY78'
        }
    });

    layer.setMap(map);

    google.maps.event.addListener(layer, 'click', function(event) {
        loadData(event.latLng.Ya, event.latLng.Xa);
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
            loadData(results[0].geometry.location.Ya, results[0].geometry.location.Xa);
            map.setZoom(14);
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}

function loadData(y, x) {
    $.ajax({
        type: "GET",
        url: "get-district.php",
        data: {
            'long': y,
            'lat': x
        },
        dataType: "json"
    }).done(function(key) {
        //don't reload the same data... that would be silly
        if(loadedDistrict !== key){
            clearMarkers();
            addPollingStations(polling_stations[key]);
            addDistrictData(districts[key]);
            loadedDistrict = key;
        }
    });
}

function addPollingStations(data) {
    for (i in data) {
        var pos = data[i];
        if(pos){
            var location = new google.maps.LatLng(pos['lat'], pos['long']);
            var info = '<b>'+pos['place_name'] + '</b>' + '<p>' + pos['address'] + ', ' + pos['city'] + '</p>';
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

function addDistrictData(data){
    string = '';
    string += '<h5>'+data.district+': ' + data.name + '</h5>';
    string += '<h6>Voters: '+data.voters+'</h6>';
    string += '<h6> Candidates: </h6>';
    
    for(i in data['candidates']){
        if(typeof data['candidates'][i] !== 'undefined'){
            var cdt = data['candidates'][i];
            string += '<strong>'+cdt.name+'</strong>';
            string += '<ul>';
                if(cdt.site !== ''){
                    string += '<li>Website : <a target="_blank" href="'+cdt.site+'">'+cdt.site+'</a></li>';
                }
                if(cdt.twitter !== ''){
                    string += '<li>Twitter : <a target="_blank" href="https://twitter.com/'+cdt.twitter+'">'+cdt.twitter+'</a></li>';
                }
                if(cdt.email !== ''){
                    string += '<li>Email : <a target="_blank" href="mailto:'+cdt.email+'">'+cdt.email+'</a></li>';
                }
            string += '</ul>';
        }
    }
    $('#district-data').html(string).addClass('panel');
}

function listenMarker(marker, info) {
    
    google.maps.event.addListener(marker, 'click', function(data) {
        if(tooltip){
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
        $(document).foundationAlerts();
        $(document).foundationButtons();
        $(document).foundationAccordion();
        $(document).foundationNavigation();
        $(document).foundationCustomForms();
        $(document).foundationMediaQueryViewer();
        $(document).foundationTabs({
            callback: $.foundation.customForms.appendCustomMarkup
        });

        $(document).tooltips();
        $('input, textarea').placeholder();

        initialize();
        $('#find-it').click(function() {
            $('#district-data').html('').removeClass('panel');
            clearMarkers();
            codeAddress();
            window.location.hash = "map-canvas";
        })
    });

})(jQuery);