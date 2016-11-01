MassAPI
==========================

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/6cc20e1e-be9a-44ff-b443-4f38488dc395/big.png)](https://insight.sensiolabs.com/projects/6cc20e1e-be9a-44ff-b443-4f38488dc395)

Starting with France, and based on [ÉgliseInfo / MessesInfo](http://egliseinfo.catholique.fr) data, trying to improve the mass schedules visualisations.

1. Retrieving mass schedules and places (For France, through [ÉgliseInfo / MessesInfo](http://egliseinfo.catholique.fr) GWT API ([example here](./MesseInfoAPIexample.md))
2. Working on nice visualisations, maps, nearest mass...

Using: Schema.org, Platform API, SyliusResourceBundle

Thinking it might become a wordwide platform, [here are listed other information sources](./SOURCES.md).

## OSM POI retrieval 

_i.e._ OpenStreetMap Point of Interest

### Overpass API

Presentation [is here](http://wiki.openstreetmap.org/wiki/Overpass_API), and an online tester and request generator [is here (Overpass Turbo)](http://overpass-turbo.eu)).
And there is an interesting PHP tool: [mediasuitenz/Overpass2Geojson](https://github.com/mediasuitenz/Overpass2Geojson) 

Overpass Turbo export for church search :

```
[out:json][timeout:25];
// gather results
(
  // query part for: “church”
  node["amenity"="place_of_worship"]["religion"="christian"]({{bbox}});
  way["amenity"="place_of_worship"]["religion"="christian"]({{bbox}});
  relation["amenity"="place_of_worship"]["religion"="christian"]({{bbox}});
);
// print results
out body;
>;
out skel qt;
```

With this export, query example:

```
http://overpass.osm.rambler.ru/cgi/interpreter?data=[out:json][timeout:25];(node[%22amenity%22=%22place_of_worship%22][%22religion%22=%22christian%22](48.853900969160016,2.318415641784668,48.879618718790276,2.358026504516601);way[%22amenity%22=%22place_of_worship%22][%22religion%22=%22christian%22](48.853900969160016,2.318415641784668,48.879618718790276,2.358026504516601);relation[%22amenity%22=%22place_of_worship%22][%22religion%22=%22christian%22](48.853900969160016,2.318415641784668,48.879618718790276,2.358026504516601););out;
```

Returning something like:

```
...
{
  "type": "way",
  "id": 69226577,
  "nodes": [
    1198731739,
    ...
    1198731739
  ],
  "tags": {
    "amenity": "place_of_worship",
    "architect": "Alexandre-ThÃ©odore Brongniart",
    "architect:wikipedia": "fr:Alexandre-ThÃ©odore Brongniart",
    "building": "church",
    "denomination": "catholic",
    "name": "Ã‰glise Saint-Louis-d'Antin",
    "ref:FR:CEF": "75109_03",
    "religion": "christian",
    "source": "cadastre-dgi-fr source : Direction GÃ©nÃ©rale des ImpÃ´ts - Cadastre. Mise Ã  jour : 2010",
    "start_date": "1780",
    "wheelchair": "no",
    "wheelchair_toilet": "unknown",
    "wikipedia": "fr:Ã‰glise Saint-Louis-d'Antin"
  }
},
...
```

### Planet.osm and Osmosis

"Planet.osm is the OpenStreetMap data in one file: all the nodes, ways and relations that make up our map." ([here](http://wiki.openstreetmap.org/wiki/Planet.osm))
There are [sub-regions files available](http://download.geofabrik.de/europe.html), but for example France is still 3.2Go compressed file.

Osmosis is the Java tool to manipulate and filter `.osm` files. [Documentation here](http://wiki.openstreetmap.org/wiki/Osmosis) 

After retrieving a compressed `.osm.bz2` file, use `bzip2 -d filename.osm.bz2` command to get the full set. Then, to filter :

```
osmosis --read-xml france-latest.osm --node-key-value keyValueList="amenity.place_of_worship" --write-xml placeOfWorkship-node.osm
osmosis --read-xml france-latest.osm --way-key-value  keyValueList="amenity.place_of_worship" --write-xml placeOfWorkship-way.osm
```

Output XML file looks like:

```
<?xml version='1.0' encoding='UTF-8'?>
<osm version="0.6" generator="Osmosis 0.45">
  <node id="251869088" version="3" timestamp="2012-02-29T13:51:07Z" uid="26687" user="Rouni" changeset="10827909" lat="49.0339231" lon="2.4744152">
    <tag k="name" v="Église Saint-Michel"/>
    <tag k="amenity" v="place_of_worship"/>
    <tag k="religion" v="christian"/>
    <tag k="created_by" v="JOSM"/>
  </node>
```
