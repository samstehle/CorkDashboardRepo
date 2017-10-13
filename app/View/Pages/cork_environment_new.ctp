<?php $this->assign('title', "Real Time Environment"); ?>


<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<!--<script src="/js/carparks.js"></script>-->
<!--<script src="/js/R1D1.js"></script>-->
<!-- <script src="/js/leaflet_numbered_markers.js"></script> -->
<!--<script src="/js/TileLayer.Grayscale.js"></script>-->
<!-- <script src="/js/leaflet-list-markers.js"></script> -->
<script src="/js/carParkCapacities.js"></script>

<!--<style type="text/css">
    .leaflet-popup-content {
        /*margin: 14px 20px;*/
        /*/overflow: scroll;*/
        min-Width: 50px;
        /*/max-Width: 600px;*/
        width:auto !important;
        font-size: 18px;
    }
    .leaflet-control-layers-expanded {
        padding: 6px 10px 6px 6px;
        font: 18px/1.5 "Helvetica Neue", Arial, Helvetica, sans-serif;
        color: #333;
        background: #fff;
        text-align: left;
    }
    .leaflet-div-icon {
        background: transparent;
        border: none;
        color:white;
    }

    .leaflet-marker-icon .number{
        position: relative;
        top: -44px;
        font-size: 14px;
        width: 25px;
        text-align: center;
    }

    .legend {
        text-align: left;
        line-height: 18px;
        color: #555;
        background-color:white;
    }

    .legend i {
        width: 18px;
        height: 18px;
        clear:both;
        float:left;
    }

    .info {
        padding: 2px 8px;

        background: white;
        background: rgba(255,255,255,0.8);
        box-shadow: 0 0 15px rgba(0,0,0,0.2);
        border-radius: 5px;
    }

    .info h4 {
        margin: 0 0 5px;
        color: #777;
    }


    p.intab {
        color: blue;
        padding: 0;
        margin: 0;
        font-size: 1em;
    }

    p.attribution {
        color: blue;
        padding: 0;
        margin: 0;
        font-size: 0.6em;
    }

</style>-->

<div class="onlyContent">
    <div style="border-bottom:2px solid #e5e5e5">
        <header>
            <h1>Real Time Environment Map</h1>
            <br>
        </header>
    </div>
    <div id="map" style="width: 75%; height: 300px"></div>
    <div id="airQuality" style="width: 100%; height: 55px; font-size: 1.2em; font-weight: 300; text-align: center;"> Air Quality</div>
    <div id="dataSources" class = "homeBlock">Data Sources</div>
</div>

<script>
    function myFunction() {
        let divTest = document.getElementById('test1');
        let browser = get_browser_info();
//    divTest.innerHTML = "test";

        let map;
        let zoomInit = 9;

        let cloudmadeUrl = 'http://{s}.tile.cloudmade.com/BC9A493B41014CAABB98F0471D759707/997/256/{z}/{x}/{y}.png',
                cloudmadeAttribution = 'Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade',
                cloudmade = new L.TileLayer(cloudmadeUrl, {maxZoom: 18, attribution: cloudmadeAttribution});

        let mapquestUrl = 'http://otile{s}.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png',
                mapquestAttribution = "Data CC-By-SA by <a href='http://openstreetmap.org/' target='_blank'>OpenStreetMap</a>, Tiles Courtesy of <a href='http://open.mapquest.com' target='_blank'>MapQuest</a>",
                mapquestGrey = new L.TileLayer.Grayscale(mapquestUrl, {maxZoom: 18, attribution: mapquestAttribution, subdomains: ['1', '2', '3', '4'], bgcolor: '0x80BDE3'});
        mapquestColour = new L.TileLayer(mapquestUrl, {maxZoom: 18, attribution: mapquestAttribution, subdomains: ['1', '2', '3', '4'], bgcolor: '0x80BDE3'});

        //create the tile layer with correct attribution
        let osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        let osmAttrib = 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
        let osm = new L.TileLayer(osmUrl, {maxZoom: 18, attribution: osmAttrib});
        let osmGrey = new L.TileLayer.Grayscale(osmUrl, {maxZoom: 18, attribution: osmAttrib});

        //alert(browser.version);
        //alert(browser.name);

        if (browser.name == 'MSIE' && browser.version == '9') {
            //alert(browser.version);
            //alert(browser.name);
            //alert('OK');

            map = new L.Map('map', {
                center: new L.LatLng(52.034439, -8.608861),
                zoom: zoomInit,
                layers: [osm],
                zoomControl: true
            });

        } else if (browser.name == 'MSIE' && browser.version == '10') {
            //alert(browser.version);
            //alert(browser.name);
            //alert('OK');

            map = new L.Map('map', {
                center: new L.LatLng(52.034439, -8.608861),
                zoom: zoomInit,
                layers: [osm],
                zoomControl: true
            });

        } else if (browser.name == 'Firefox' && browser.version == '8') {
            //alert(browser.version);
            //alert(browser.name);
            //alert('OK');

            map = new L.Map('map', {
                center: new L.LatLng(52.034439, -8.608861),
                zoom: zoomInit,
                layers: [osm],
                zoomControl: true
            });

        } else if (browser.name == 'Firefox' && browser.version == '7') {
            //alert(browser.version);
            //alert(browser.name);
            //alert('OK');

            map = new L.Map('map', {
                center: new L.LatLng(52.034439, -8.608861),
                zoom: zoomInit,
                layers: [osm],
                zoomControl: true
            });

        } else {
            map = new L.Map('map', {
                center: new L.LatLng(52.034439, -8.608861),
                zoom: zoomInit,
                layers: [osmGrey],
                zoomControl: false
            });
        }
//        map.addEventListener('click', onMapClick);
        //LEGEND
//        let legend = L.control({position: 'bottomright'});
//        legend.onAdd = function (map) {
//            let div = L.DomUtil.create('div', 'info legend'),
//                    grades = [0, 10, 20, 30, 40, 50, 60, 70, 80, 90],
//                    labels = [],
//                    from, to;
//            /*labels.push('Ambient Sound Level'); 
//             for (let i = 0; i < grades.length; i++) {
//             from = grades[i];
//             to = grades[i + 1];
//             labels.push('<i style="background: '+setAmbientSoundColor(from)+ '"></i> ' +
//             from + (to ? 'db&ndash;' + to +'db' : 'db'+'+'));
//             }*/
//            labels.push('Water Levels');
//            labels.push('<i style="background: #deebf7"></i>  Decreasing');
//            labels.push('<i style="background: #9ecae1"></i>  No Change');
//            labels.push('<i style="background: #3182bd"></i>  Increasing');
//            labels.push('EPA Site');
//            labels.push('<i style="background: #5F5293"></i>  Site Location');
//            div.innerHTML = labels.join('<br>');
//            return div;
//        };
//
//        legend.addTo(map);
//
//        let groupAir = new L.FeatureGroup();
//        let waterSites = new L.FeatureGroup();
//        let weatherSites = new L.FeatureGroup();
//        //let layerControl = new L.LayerControl();

        let baseMaps = {
            //"MQ Greyscale": mapquestGrey,
            // "MQ Colour": mapquestColour,
            "OSM Greyscale": osmGrey,
            "OSM Colour": osm

        };

    }

    function get_browser_info() {
        let ua = navigator.userAgent, tem, M = ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
        if (/trident/i.test(M[1])) {
            tem = /\brv[ :]+(\d+)/g.exec(ua) || [];
            return {name: 'IE', version: (tem[1] || '')};
        }
        if (M[1] === 'Chrome') {
            tem = ua.match(/\bOPR\/(\d+)/)
            if (tem != null) {
                return {name: 'Opera', version: tem[1]};
            }
        }
        M = M[2] ? [M[1], M[2]] : [navigator.appName, navigator.appVersion, '-?'];
        if ((tem = ua.match(/version\/(\d+)/i)) != null) {
            M.splice(1, 1, tem[1]);
        }
        return {
            name: M[0],
            version: M[1]
        };
    }
</script>





<!--<script type="text/javascript">
    function myFunction() {
        initial++;
        groupAir.clearLayers();//air quality ou
        waterSites.clearLayers();
        weatherSites.clearLayers();
        $row = 1;

        /*        //hydro levels
         $.get("/CarParks/hydroLevels", function(point){
         obj = JSON.parse(point);
         for(i = 0; i< 30; i=i+7){  
         let text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Water Level at "+obj[i]+"  </p><b> "+obj[i+3]+":  " +obj[i+4]+"m <br>"+obj[i+5] +": "+obj[i+6] +"m                         </b></td></tr></table>"
         let hydroLevelSite = {
         "type": "Feature",
         "properties": {
         "name": ""+obj[i],
         "amenity": "River Level",
         "popupContent": text,
         },
         "geometry": {
         "type": "Point",
         "coordinates": [obj[i+2],obj[i+1]]
         }
         };
         
         let hydroLevelSiteOptions = {
         radius: 8,
         fillColor: setWaterGuageColour(obj[i+4], obj[i+6]),
         color: "#000",
         weight: 1,
         opacity: 1,
         fillOpacity: 1 
         };
         
         waterSites.addLayer( L.geoJson(hydroLevelSite,{ 
         onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
         return L.circleMarker(latlng, hydroLevelSiteOptions);
         }}));
         }
         
         });
         
         
         //water levels                 
         $.get("/CarParks/readWaterLevels", function(point){
         obj = JSON.parse(point);
         
         for(i = 0; i< 27; i=i+7){     
         let text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Water Level at "+obj[i]+" </p><b> "+obj[i+3]+":  " +obj[i+4]+"m <br>"+obj[i+5] +": "+obj[i+6] +"m                          </b></td></tr></table>"
         let waterLevelSite = {
         "type": "Feature",
         "properties": {
         "name": ""+obj[i+0],
         "amenity": "River Level",
         "popupContent": text,
         },
         "geometry": {
         "type": "Point",
         "coordinates": [obj[i+2],obj[i+1]]
         }
         };
         
         let waterLevelSiteOptions = {
         radius: 8,
         fillColor: setWaterGuageColour(obj[i+4], obj[i+6]),
         color: "#000",
         weight: 1,
         opacity: 1,
         fillOpacity: 1 //setMarkerIntensity(spaces)
         };
         
         waterSites.addLayer( L.geoJson(waterLevelSite,{ 
         onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
         return L.circleMarker(latlng, waterLevelSiteOptions);
         }}));
         }
         
         });
         */

        //weather 
        /* for(let j = 1; j<7;j++){ //all the stations that we have
         let action = "/CarParks/weather/"+j;
         $.get(action, function(point){
         obj = JSON.parse(point);
         let lat = obj.current_observation.display_location.latitude;
         let lon = obj.current_observation.display_location.longitude;
         let name = obj.current_observation.observation_location.city;
         let currentTemp = obj.current_observation.temp_c;
         let currentWeather = obj.current_observation.weather;
         let url = obj.current_observation.ob_url;
         
         let weatherIcon = L.Icon.extend({
         options: {
         iconSize:     [36, 45], 
         iconAnchor:   [18, 45],
         popupAnchor:  [-3, -46]
         }
         });
         
         let weatherIcon= new weatherIcon({iconUrl: '/dublindashboard/img/Dashboard/icons/weather_icon.png'});    
         let siteId = "weatehrSite1";
         let text = "<table style=\"width:300px\"><tr><td><p class=\"intab\">Conditions at "+name+"</p><b> Weather: "+ currentWeather +"<br> Temperature: " +currentTemp + " Celcius </b></td></tr><tr><td><p class=\"attribution\">Data obtained from wunderground <a href=\""+url+"\"  target=\"_blank\">(more)</a></p></tr></td></table>";
         
         let weatherSite = {
         "type": "Feature",
         "properties": {
         "name": ""+name,
         "amenity": "weatherStation",
         "popupContent": text,
         },
         "geometry": {
         "type": "Point",
         "coordinates": [lon,lat]
         }
         };
         
         let weatherSiteOptions = {
         radius: 8,
         fillColor: "#228B22",
         color: "#000",
         weight: 1,
         opacity: 1,
         fillOpacity: 1 //setMarkerIntensity(spaces)
         };
         weatherSites.addLayer(L.geoJson(weatherSite ,{ 
         onEachFeature: onEachWeatherFeature, pointToLayer: function (feature, latlng) {
         return L.marker(latlng, {icon:weatherIcon}).bindPopup(weatherSite.popupContent);;
         }}));   
         });
         
         }//end for loop
         
         */

        let action = "/CarParks/nraWeather/" + 1;
        $.get(action, function (point) {
            obj = JSON.parse(point);
            for (let i = 0; i < 86; i++) {
                let lat = obj[i].lat[0];
                let lon = obj[i].lon[0];
                let name = obj[i].siteName[0];
                let id = obj[i].siteID[0];
                let number = obj[i].number[0];

                let currentTemp = obj[i].temp[0];
                let windSpeed = obj[i].windSpeed[0];
                let windDirection = obj[i].windDirection[0];
                let roadTemp = obj[i].roadTemp[0];
                let precipitation = obj[i].precipitation[0];
                let currentWeather = "";


                if (!precipitation) {
                    let precipitation = "NA";
                }

                let weatherIcon = L.Icon.extend({
                    options: {
                        iconSize: [40, 40],
                        iconAnchor: [20, 40],
                        popupAnchor: [-3, -41]
                    }
                });

                let weatherIcon = new weatherIcon({iconUrl: '/dublindashboard/img/Dashboard/icons/weather_icon.png'});
                let siteId = "weatehrSite1";
                let text = "<table style=\"width:300px\"><tr><td><p class=\"intab\">Conditions at " + name + "</p><b> Weather: " + currentWeather + "<br> Air Temperature: " + currentTemp + " Celcius <br> Road Temperature: " + roadTemp + "<br> Wind Speed: " + windSpeed + " <br> Wind Direction: " + windDirection + "<br> Precipitation: " + precipitation + " </b></td></tr><tr><td><p class=\"attribution\">Data obtained from TIF </p></tr></td></table>";

                let weatherSite = {
                    "type": "Feature",
                    "properties": {
                        "name": "" + name,
                        "amenity": "weatherStation",
                        "popupContent": text,
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [lon, lat]
                    }
                };

                let weatherSiteOptions = {
                    radius: 8,
                    fillColor: "#228B22",
                    color: "#000",
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 1 //setMarkerIntensity(spaces)
                };
                weatherSites.addLayer(L.geoJson(weatherSite, {
                    onEachFeature: onEachWeatherFeature, pointToLayer: function (feature, latlng) {
                        return L.marker(latlng, {icon: weatherIcon}).bindPopup(weatherSite.popupContent);
                        ;
                    }}));
            }//end for
        });

        function onEachWeatherFeature(feature, layer) {
            popup = layer.bindPopup(layer.feature.properties.popupContent);  //essential

        }

        let previousWaterLevels = null;

        //Cork Water Levels Previous

        /*$.get("/CarParks/corkWaterLevels/1", function(point){
         previousWaterLevels = JSON.parse(point);
         // add a delay
         });*/

        $.ajax({
            async: false,
            type: 'GET',
            url: '/CarParks/corkWaterLevels/1',
            success: function (point) {
                previousWaterLevels = JSON.parse(point);

            }
        });


        //Cork Water Levels Current
        $.get("/CarParks/corkWaterLevels/0", function (point) {
            obj = JSON.parse(point);
            ///get the other file and then compare


            // alert(previousWaterLevels);

            //  {"geometry": {"type": "Point", "coordinates": [-9.0763879999999997, 53.387031999999998]}, "type": "Feature", "id": 1640, "properties": {"url": "/0000030083/0001/", "csv_file": "/data/month/30083_0001.csv", "station.name": "Annaghdown Pier", "value": 0.615, "datetime": "2017-06-10 08:15:00+00:00", "sensor.ref": "0001", "station.ref": "0000030083", "station.region_id": 11, "err_code": 99}}      

            let numOfWaterStations = obj.features.length;
            let previousNumOfWaterStations = obj.features.length;

            for (let i = 0; i < numOfWaterStations; i++) {

                //if Cork/Dub Stations{
                if (obj.features[i]["properties"]["station.ref"] < 41000) {
                    if (obj.features[i]["properties"]["station.region_id"] == 8) {

                        //   }


                        let stationName = obj.features[i]["properties"]["station.name"];
                        let stationRef = obj.features[i]["properties"]["sensor.ref"];
                        let date = obj.features[i]["properties"]["datetime"];
                        let lon = obj.features[i]["geometry"]["coordinates"][0];
                        let lat = obj.features[i]["geometry"]["coordinates"][1];
                        let waterLevel = obj.features[i]["properties"]["value"];
                        let id = obj.features[i]["properties"]["value"];

                        //need to loop through to find matching references
                        for (let j = 0; j < previousNumOfWaterStations; j++) {

                            let previousStationName = previousWaterLevels.features[j]["properties"]["station.name"];
                            let previousStationRef = previousWaterLevels.features[j]["properties"]["sensor.ref"];
                            if (stationName == previousStationName && stationRef == previousStationRef) {
                                //alert("match");
                                let previousWaterLevel = previousWaterLevels.features[j]["properties"]["value"];
                                let previousDate = previousWaterLevels.features[j]["properties"]["datetime"];
                                let previousStationName = previousWaterLevels.features[j]["properties"]["station.name"];
                                break;
                            }



                        }
                        //add to map
                        let text = "<table style=\"width:300px\"><tr><td><b><font color=\"#0000ff\">" + date + ": </font> The Water Level at " + stationName + " is " + waterLevel + " </b></td></tr><tr><td><b><font color=\"#0000ff\">" + previousDate + ": </font>The Water Level at " + previousStationName + " was " + +previousWaterLevel + " </b></td></tr></table>";

                        let waterLevelSite = {
                            "type": "Feature",
                            "properties": {
                                "name": stationName,
                                "amenity": "Water Level",
                                "popupContent": text,
                            },
                            "geometry": {
                                "type": "Point",
                                "coordinates": [lon, lat]
                            }
                        };

                        let waterLevelSiteOptions = {
                            radius: 8,
                            //fillColor: "#ff7800",
                            fillColor: setWaterColour(waterLevel, previousWaterLevel),
                            color: "#000",
                            weight: 1,
                            opacity: 1,
                            fillOpacity: 1 //setMarkerIntensity(spaces)
                        };

                        waterSites.addLayer(L.geoJson(waterLevelSite, {
                            onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                                return L.circleMarker(latlng, waterLevelSiteOptions);
                            }}));
                    }
                }
            }

        }
        );

        //airQuality
        groupAir.addLayer(L.geoJson(airQualitySite1, {
            onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                return L.circleMarker(latlng, airQualitySiteOptions);
            }}));
        groupAir.addLayer(L.geoJson(airQualitySite2, {
            onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                return L.circleMarker(latlng, airQualitySiteOptions);
            }}));

        groupAir.addLayer(L.geoJson(airQualitySite3, {
            onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                return L.circleMarker(latlng, airQualitySiteOptions);
            }}));
        groupAir.addLayer(L.geoJson(airQualitySite4, {
            onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                return L.circleMarker(latlng, airQualitySiteOptions);
            }}));
        groupAir.addLayer(L.geoJson(airQualitySite5, {//winetavern street
            onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                return L.circleMarker(latlng, airQualitySiteOptions);
            }}));


        if (initial == 1 || map.hasLayer(groupAir)) {
            groupAir.addTo(map);
            soundSites.addTo(map);
            waterSites.addTo(map);
            weatherSites.addTo(map);
        }
        setTimeout(myFunction, 300000); //milliseconds 300000 - 5mins 



        });
                function onEachFeature(feature, layer) {
                    layer.on({
                        mouseover: highlightFeature,
                        mouseout: resetHighlight,
                    });

                }





        function resetHighlight(e) {
            let layer = e.target;
            layer.setStyle({// highlight the feature
                weight: 1,
                color: '#666',
                dashArray: '',
            });
        }


        function highlightFeature(e) {
            let layer = e.target;

            layer.setStyle({// highlight the feature
                weight: 5,
                color: '#666',
                dashArray: '',
            });

            if (!L.Browser.ie && !L.Browser.opera) {
                layer.bringToFront();
            }
            popup = layer.bindPopup(layer.feature.properties.popupContent);  //essential
        }






        //CARPARKS
        $.get("/CarParks/nowParking", function (point) {
            function onEachFeature(feature, layer) {
                layer.on({
                    mouseover: highlightFeature,
                    mouseout: resetHighlight,
                });

            }

            function resetHighlight(e) {
                let layer = e.target;
                layer.setStyle({// highlight the feature
                    weight: 1,
                    color: '#666',
                    dashArray: '',
                    //fillOpacity: setMarkerIntensity(
                });
            }

            function highlightFeature(e) {
                let layer = e.target;

                layer.setStyle({// highlight the feature
                    weight: 5,
                    color: '#666',
                    dashArray: '',
                    //fillOpacity: 0.6
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }

                popup = layer.bindPopup(layer.feature.properties.popupContent);  //essential
            }


            function highlightRoadFeature(e) {
                let layer = e.target;

                layer.setStyle({// highlight the feature
                    weight: 10,
                    color: '#FF0000',
                    dashArray: '',
                    //fillOpacity: 0.6
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }

                layer.bindPopup(layer.feature.properties.popupContent);  //essential
            }
        });


    }

    function setWaterGuageColour(currentVal, previousVal) {
        if (currentVal < previousVal) { //falling

            return '#deebf7'
        } else if (currentVal > previousVal) { //rising

            return '#3182bd'

        } else { //no change
            return '#9ecae1'

        }

    }


    function setWaterColour(current, previous) {

        if (current < previous) {
            return '#deebf7'; //decreasing
        } else if (current > previous) {
            return '#9ecae1'; //increasing
        } else
            return '#9ecae1';//no change


    }
    function setTripsColour(travelTime) {
        let good = 10;//need the freeflow traveltime
        return travelTime < good ? '#00FF00' :
                travelTime > good ? '#FF0000' :
                '#00FF00';
    }

    function onMapClick(e) {

    }
    
    
    // check browser version type
    

    //EPAOverall Air Quality
    $.get("/CarParks/airQuality", function (point) {
        obj = JSON.parse(point);
        let count = 6; //there are 6 results in the return
        for (let i = 0; i < count; i++) {
            if (obj.aqihsummary[i]["aqih-region"] == "Cork_City") {
                let airReport = "Current Air Quality Index for Health for " + obj.aqihsummary[i]["aqih-region"] + " is " + obj.aqihsummary[i].aqih

                let div = document.getElementById('airQuality');
                div.innerHTML = div.innerHTML + airReport;
                if (obj.aqihsummary[i].aqih == "1,Good") {
                    div.style.backgroundColor = 'green';
                    div.style.color = 'white';
                } else if (obj.aqihsummary[i].aqih == "2,Good") {
                    div.style.backgroundColor = 'green';
                    div.style.color = 'white';
                } else if (obj.aqihsummary[i].aqih == "3,Good") {
                    div.style.backgroundColor = 'green';
                    div.style.color = 'white';
                } else if (obj.aqihsummary[i].aqih == "4,Fair") {
                    div.style.backgroundColor = 'orange';
                    div.style.color = 'white';
                } else if (obj.aqihsummary[i].aqih == "5,Fair") {
                    div.style.backgroundColor = 'orange';
                    div.style.color = 'white';
                } else if (obj.aqihsummary[i].aqih == "6,Fair") {
                    div.style.backgroundColor = 'orange';
                    div.style.color = 'white';
                } else {
                    div.style.backgroundColor = 'red';
                    div.style.color = 'white';
                }
            }
        }
        let divData = document.getElementById('dataSources');
        divData.innerHTML = divData.innerHTML + "<h5>Data Sources</h5>";
        divData.innerHTML = divData.innerHTML + "<h5>The Air Quality Index is taken directly from the Environmental Protection Agency (EPA). More information about how this index is compiled can be found <a href=\"http://www.epa.ie/air/quality/index/#.U_tMLPldXh4\" target=\"_blank\">here.</a></h5>";

        divData.innerHTML = divData.innerHTML + "<h5>The Air Quality Data at selected sites is taken from the Environmental Protection Agency (EPA). More information about this data can be found <a href=\"http://www.epa.ie/air/quality/data/#.U_tPn_ldXh7\" target=\"_blank\">here.</a></h5>";

        divData.innerHTML = divData.innerHTML + "<h5>The Hydrometric Data (water level) at selected sites is taken from the Environmental Protection Agency (EPA). More information about this data can be found <a href=\"http://www.epa.ie/hydronet/#Water%20Levels\" target=\"_blank\">here.</a></h5>";

        divData.innerHTML = divData.innerHTML + "<h5>The River Level Data at selected sites is taken from the Office of Public Works (OPW). More information about this data can be found <a href=\"http://waterlevel.ie/\" target=\"_blank\">here.</a></h5>";

        divData.innerHTML = divData.innerHTML + "<h5>Selected Weather Data is taken from Transport Infrastructure Ireland. More information about this data can be found <a href=\"https://www.nratraffic.ie/weather/\" target=\"_blank\">here</a>.</h5>";
    }); //END AirQuality


    //Map Styling
    //Individual AirQuality Locations

    let airQualitySite1 = {//Cork Institute of Technology
        "type": "Feature",
        "properties": {
            "amenity": "EPA Environmental Sensor",
            "popupContent": "<h5><b>EPA Site: Cork Institute of Technology </b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://erc.epa.ie/real-time-air/www/images/epaweb/JPEG/Cork_IT_OZONE_past7days_O3.JPG\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-8.534432, 51.885330]
        }
    };

    let airQualitySite2 = {//South Link Road
        "type": "Feature",
        "properties": {
            "amenity": "EPA Environmental Sensor",
            "popupContent": "<h5><b>EPA Site: South Link Road </b></h5>" + "<table style=\"width:405px\"> <tr><td><img src=\"http://erc.epa.ie/real-time-air/www/images/epaweb/JPEG/Kinsale_Rd_past7days_O3_NO2_SO2.JPG\" width=\"400px\" height=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-8.456669, 51.877165]
        }
    };

    let airQualitySite3 = {//Rathmines
        "type": "Feature",
        "properties": {
            "amenity": "EPA Environmental Sensor",
            "popupContent": "<h5><b>EPA Site: Rathmines </b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://erc.epa.ie/real-time-air/www/images/epaweb/JPG/Rathmines_past7days_O3_NO2_SO2.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.2667394, 53.322065]
        }
    };

    let airQualitySite4 = {//Swords
        "type": "Feature",
        "properties": {
            "amenity": "EPA Environmental Sensor",
            "popupContent": "<h5><b>EPA Site: Swords </b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://erc.epa.ie/real-time-air/www/images/epaweb/JPEG/Swords_O3_Swords_NOX_past7days_O3_NO2.JPG\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.22428, 53.4578, ]
        }
    };

    let airQualitySite5 = {//winetavern street
        "type": "Feature",
        "properties": {
            "amenity": "EPA Environmental Sensor",
            "popupContent": "<h5><b>EPA Site: Winetavern Street </b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://erc.epa.ie/real-time-air/www/images/epaweb/JPG/Winetavern_Street_past7days_NO2_SO2.JPG\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.2718196, 53.3438963]
        }
    };


    let airQualitySiteOptions = {
        radius: 10,
        fillColor: "#5F5293",
        fillOpacity: 1,
        opacity: 1,
        color: "#000"
    };

    

    let overlayMaps = {
        "EPA Monitoring Sites": groupAir,
        // "Ambient Sound Recording Sites": soundSites,
        "EPA Water Level Sites": waterSites,
        "Weather Sites": weatherSites
    };

    layerControl = L.control.layers(baseMaps, overlayMaps);
    layerControl.addTo(map);
    let initial = 0;  //check to add everythign initially to first map.

</script>-->




