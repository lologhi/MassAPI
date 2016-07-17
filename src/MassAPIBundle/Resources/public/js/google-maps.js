var coordinates = [details['longitude'], details['latitude']];
var name = 'Default position';

mapboxgl.accessToken = 'pk.eyJ1IjoibGF1cmVudGdoIiwiYSI6IjdveXNkOEUifQ.F7qS-bIlU5-e23HB-SBDpA';
var map = new mapboxgl.Map({
    container: 'gmap',
    center: coordinates,
    zoom: 13,
    style: 'mapbox://styles/mapbox/outdoors-v9'
});
map.addControl(new mapboxgl.Navigation());

map.on('load', function() {
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(function (position) {
            coordinates = [position.coords.longitude, position.coords.latitude];
            name = 'My position';
            map.setCenter(coordinates, 16);
        });
    }

    map.addSource("mylocation", {
        "type": "geojson",
        "data": {
            "type": "FeatureCollection",
            "features": [{
                "type": "Feature",
                "properties": {
                    "title": name,
                    "icon": "star"
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": coordinates
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
        lat2: encodeURIComponent(bounds.getSouthWest().lat)
    })).done(function(data) {
        // If we didn't receive anything, we don't do anything
        if ($.isEmptyObject(data)) {
            return;
        }

        if (undefined !== map.getSource('places')) {
            map.removeSource('places');
        }

        var places = new mapboxgl.GeoJSONSource({
            data: data
        });
        map.addSource('places', places);

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
});

// Create a popup, but don't add it to the map yet.
var popup = new mapboxgl.Popup({
    closeButton: false,
    closeOnClick: false
});

map.on('mousemove', function(e) {
    var features = map.queryRenderedFeatures(e.point, { layers: ['places'] });
    // Change the cursor style as a UI indicator.
    map.getCanvas().style.cursor = (features.length) ? 'pointer' : '';

    if (!features.length) {
        popup.remove();
        return;
    }

    var feature = features[0];

    // Populate the popup and set its coordinates
    // based on the feature found.
    popup.setLngLat(feature.geometry.coordinates)
        .setHTML(feature.properties.events)
        .addTo(map);
});
