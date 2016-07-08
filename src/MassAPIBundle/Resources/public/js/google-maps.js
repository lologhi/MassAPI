window.onload = loadScript;

function loadScript() {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?v=3&key=' + villa_details['google_maps_key'] +
        '&signed_in=true&callback=initialize';
    document.body.appendChild(script);
}

/* START GEOLOCATION */

if (!navigator.geolocation) {
    alert('Geolocation is not available');
} else {
    geolocate.onclick = function (e) {
        e.preventDefault();
        e.stopPropagation();
        map.locate();
    };
}

map.on('locationfound', function(e) {
    map.setView([e.latlng.lat, e.latlng.lng], 16);
    var locationLayer = L.mapbox.featureLayer().addTo(map);
    locationLayer.setGeoJSON({
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [e.latlng.lng, e.latlng.lat]
        },
        properties: {
            'title': 'Here I am!',
            'marker-color': '#ff8888',
            'marker-symbol': 'star'
        }
    });
    geolocate.parentNode.removeChild(geolocate);
});
map.on('locationerror', function() {
    geolocate.innerHTML = 'Position could not be found';
});
/* END GEOLOCATION */

function initialize() {

    var villaPosition = new google.maps.LatLng(villa_details['latitude'],villa_details['longitude']);
    var mapOptions = {
        center: villaPosition, zoom: 15, scrollwheel: false, streetViewControl: false,
        styles: [
            { featureType: "all", elementType: "all", stylers: [ { visibility: "on" }, { saturation: -100 }, { gamma: 1.94 } ] },
            { featureType: "water", stylers: [ { color: "#f3ffff" } ] },
            { featureType: "poi", stylers: [{visibility: "off"}] }
        ]
    };
    var map = new google.maps.Map(document.getElementById('gmap'), mapOptions);

    var villaMarker = new google.maps.Marker({position: villaPosition, map: map, title:villa_details['name'], icon: villa_details['mapIcon']});

    infoWindow = new google.maps.InfoWindow({content: ""});
    map.data.addListener('click', function(event) {
        infoWindow.setContent('<div><a href="'+event.feature.getProperty('link')+'"><h3>'+event.feature.getProperty('title')+'</h3></a><div>'+event.feature.getProperty('description')+'</div></div>');
        var anchor = new google.maps.MVCObject();
        anchor.set("position",event.latLng);
        infoWindow.open(map,anchor);
    });

    map.data.setStyle(function(feature) {
        var iconUrl = feature.getProperty('iconUrl');
        var iconSize = new google.maps.Size(32, 37);
        var iconOrigin = new google.maps.Point(feature.getProperty('iconOriginX'),feature.getProperty('iconOriginY'));

        return ({
            icon: {
                url: iconUrl,
                size: iconSize,
                origin: iconOrigin
            }
        });
    });

    // when the map is deplaced, we retrieve the geoJson of corresponding POI
    google.maps.event.addListener(map, 'idle', function() {
        var bounds = map.getBounds();

        // If map area is a point (surface = 0), we don't even trigger the request
        if (bounds.getSouthWest().lng() == bounds.getNorthEast().lng() || bounds.getSouthWest().lat() == bounds.getNorthEast().lat()) {
            return;
        }

        $.getJSON(Routing.generate('front_poi_list', {
            lng1: encodeURIComponent(bounds.getSouthWest().lng()),
            lat1: encodeURIComponent(bounds.getNorthEast().lat()),
            lng2: encodeURIComponent(bounds.getNorthEast().lng()),
            lat2: encodeURIComponent(bounds.getSouthWest().lat()),
            _locale: villa_details['locale'],
            host: window.location.hostname
        })).done(function(data) {
            // If we didn't receive anything, we don't do anything
            if ($.isEmptyObject(data)) {
                return;
            }

            map.data.forEach(function(feature) {
                map.data.remove(feature);
            });

            map.data.addGeoJson(data);
        });
    });

}
