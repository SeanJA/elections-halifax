var geocoder;
var map;
var markersArray = [];

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
                position: results[0].geometry.location
            });
            markersArray.push(marker);
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
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
            window.location.hash="map-canvas";
        })
    });

})(jQuery);