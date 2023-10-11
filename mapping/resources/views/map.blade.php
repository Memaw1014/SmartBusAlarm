<!DOCTYPE html>
<html>
<head>
    <title>Real-Time Map</title>
    <style>
        /* Style to position the button at the bottom */
        #backButton, #historyButton {
            position: absolute;
            bottom: 20px;
            padding: 10px 10px; /* Adjust padding as needed */
            font-size: 16px; /* Adjust font size as needed */
        }
        #backButton {
            left: 20px;
        }
        #historyButton {
            left: 150px;
        }
       
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.css">
</head>
<body>
    <div id="map" style="height: 100vh;"></div>
    <button id="backButton" style="z-index: 1000; width: 100px; height: 40px;">BACK</button>
    <button id="historyButton" style="z-index: 1000; width: 100px; height: 40px;">HISTORY</button>
    <button id="currentLocationButton" style="z-index: 1000; width: 150px; height: 40px;">GET LOCATION</button>

    <div id="map"></div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.js"></script>

    <script>
        // Your custom JavaScript code here
        var map = L.map('map').setView([10.3346, 125.1709], 10); // Centered on Southern Leyte, adjusted zoom level

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var customMarkerIcon = L.icon({
            iconUrl: 'map-app/img',
            iconSize: [25, 25]
        });

        function getUserLocation() {
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var userLat = position.coords.latitude;
                    var userLng = position.coords.longitude;

                    map.setView([userLat, userLng], 10); 

                    var userMarker = L.marker([userLat, userLng]).addTo(map);
                    userMarker.bindPopup("Your Location").openPopup();
                    
                }, function (error) {
                    console.error("Error getting user location:", error);
                    alert("Unable to retrieve your location.");
                });
            } else {
                alert("Geolocation is not supported by your browser.");
            }
        }

        // Create routes to Sogod and Maasin
        function createRoutes() {
            createRoute("Sogod", [10.384170409656667, 124.98295814640451], [10.378077334958405, 124.96959720419434]);
            createRoute("Bontoc", [10.378077334958405, 124.96959720419434], [10.326349, 124.971775]);
            createRoute("Tomas Oppus", [10.326349, 124.971775], [10.234187, 124.978463]);
            createRoute("Malitbog", [10.234187, 124.978463], [10.102049, 125.008913]);
            createRoute("Padre Burgos", [10.102049, 125.008913], [10.031811634190236, 125.0097724038416]);
            createRoute("Maacrohon", [10.031811634190236, 125.0097724038416], [10.116513620264532, 124.89404637267265]);
            createRoute("Maasin", [10.116513620264532, 124.89404637267265], [10.132195394128429, 124.83481102052342]);
        
        }

        // Create a route
        function createRoute(routeName, startCoords, endCoords) {
            var start = L.latLng(startCoords[0], startCoords[1]);
            var end = L.latLng(endCoords[0], endCoords[1]);

            var route = L.Routing.control({
                waypoints: [
                    L.latLng(start),
                    L.latLng(end)
                ],
                routeWhileDragging: true,
                lineOptions: {
                    styles: [{ color: 'red', opacity: 0.7, weight: 7 }]
                }
            }).addTo(map);

            route.on('routesfound', function (e) {
                var routes = e.routes;
                console.log(routeName + " route:", routes);
            });
        }

        // Call the createRoutes() function to create routes
        createRoutes();

        document.addEventListener("DOMContentLoaded", getUserLocation);
        // Add event listener to the "GET LOCATION" button
        document.getElementById("currentLocationButton").addEventListener("click", function () {
            getUserLocation();
        });

        // Add event listener to the BACK button
        document.getElementById("backButton").addEventListener("click", function () {
            // Redirect back to the selection.blade.view URL
            window.location.href = "http://127.0.0.1:8000";
        });
        document.getElementById("historyButton").addEventListener("click", function () {
            // Redirect to the history.blade.php URL
            window.location.href = "http://127.0.0.1:8000/history";
        });



    </script>
</body>
</html>
