var geocoder;
var map;
var markersArray = [];
var tooltip = null;


function clearOverlays() {
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
            load_data(results);
            map.setZoom(14);
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}

function load_data(results) {
    $.ajax({
        type: "GET",
        url: "get-district.php",
        data: {
            'long': results[0].geometry.location.Ya,
            'lat': results[0].geometry.location.Xa
        },
        dataType: "json"
    }).done(function(key) {
        add_polling_stations(polling_stations[key]);
        district_data(districts[key]);
    });
}

function add_polling_stations(data) {
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

function district_data(data){
    string = '';
    string += '<h5>'+data.district+': ' + data.name + '</h5>';
    string += '<h6>Voters: '+data.voters+'</h6>';
    string += '<h6> Candidates: </h6>';
    string += '<ul>';
    for(i in data['candidates']){
        if(typeof data['candidates'][i] !== 'undefined'){
            string += '<li>'+data['candidates'][i].name+'</li>';
        }
    }
    string += '</ul>';
    $('#district-data').html(string);
}

function listenMarker(marker, info) {
    
    google.maps.event.addListener(marker, 'click', function() {
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
            clearOverlays();
            codeAddress();
            window.location.hash = "map-canvas";
        })
    });

})(jQuery);