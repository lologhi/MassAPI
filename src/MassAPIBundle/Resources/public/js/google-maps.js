/* START GEOLOCATION */

/*if (!navigator.geolocation) {
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
});*/
/* END GEOLOCATION */

mapboxgl.accessToken = 'pk.eyJ1IjoibGF1cmVudGdoIiwiYSI6IjdveXNkOEUifQ.F7qS-bIlU5-e23HB-SBDpA';
var map = new mapboxgl.Map({
    container: 'gmap',
    center: [details['longitude'], details['latitude']],
    zoom: 13,
    style: 'mapbox://styles/mapbox/outdoors-v9'
});
map.addControl(new mapboxgl.Navigation());
map.scrollZoom.disable();

map.on('load', function () {
    // Add a GeoJSON source containing place coordinates and information.
    map.addSource("mylocation", {
        "type": "geojson",
        "data": {
            "type": "FeatureCollection",
            "features": [{
                "type": "Feature",
                "properties": {
                    "title": details['name'],
                    "icon": "star"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [details['longitude'], details['latitude']]
                }
            }]
        }
    });

    // Add a layer showing the places
    map.addLayer({
        "id": "mylocation",
        "type": "symbol",
        "source": "mylocation",
        "layout": {
            "icon-image": "{icon}-15",
            "text-field": "{title}",
            "text-font": ["Open Sans Semibold", "Arial Unicode MS Bold"],
            "text-offset": [0, 0.6],
            "text-anchor": "top"
        }
    });
}).on('dragend', function() {
    var bounds = map.getBounds();

    $.getJSON(Routing.generate('place', {
        lng1: encodeURIComponent(bounds.getSouthWest().lng),
        lat1: encodeURIComponent(bounds.getNorthEast().lat),
        lng2: encodeURIComponent(bounds.getNorthEast().lng),
        lat2: encodeURIComponent(bounds.getSouthWest().lat),
    })).done(function(data) {
        // If we didn't receive anything, we don't do anything
        if ($.isEmptyObject(data)) {
            return;
        }

        if (map.getSource('places')) {
            map.removeSource('places');
        }

        var places = new mapboxgl.GeoJSONSource({
            data: data
        });
        map.addSource('places', places);
    });

    map.addLayer({
        "id": "places",
        "type": "symbol",
        "source": "places",
        "layout": {
            "icon-image": "{icon}-15",
            "text-field": "{title}",
            "text-font": ["Open Sans Semibold", "Arial Unicode MS Bold"],
            "text-offset": [0, 0.6],
            "text-anchor": "top"
        }
    });
});
