<!DOCTYPE html>
<html>
<head>
    <title>Real-Time Map</title>
    <style>
        /* Style to position the button at the bottom */
        .header-buttons {
            position: absolute;
            top: 60px;
            padding: 10px 10px; /* Adjust padding as needed */
            font-size: 16px; /* Adjust font size as needed */
        }
        #currentLocationButton {
            left: 20px;
        }
        
        #backButton {
            left: 150px;
        }
        #historyButton {
            right: 20px;
        }

        #map {
            margin-top: 40px; /* Adjust the top margin as needed */
            height: calc(100vh - 100px); /* Adjust the height and top margin to leave space for the buttons and title */
            overflow: hidden; /* Hide the vertical scrollbar if content overflows */
        
        }

    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.css">
</head>
<body>
    <h1>Real-Time Map</h1>
    
    <!-- Header buttons -->
    <div class="header-buttons">
        <button id="currentLocationButton">Get Location</button>
        <button id="backButton">Back</button>
        <button id="historyButton">History</button>
    </div>
    <div id="map" style="width: 100%; height: 500px;"></div>
    
    
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.js"></script>

    <script>
    // Check Local Storage for values of SEAT NO. 1 and SEAT NO. 2
    var seat1Value = localStorage.getItem("SEAT NO. 1");
    var seat2Value = localStorage.getItem("SEAT NO. 2");

    // Get references to the buttons
    var backdisable = document.getElementById("backButton"); // Change "backButton" to the correct ID of SEAT NO. 1 button
    // Disable buttons if Local Storage values are not empty
        if (seat1Value && seat1Value.trim() !== "" && seat2Value && seat2Value.trim() !== "") {
            backdisable.disabled = true;
        }

</script>
    <script>
        // Your custom JavaScript code here
        var map = L.map('map').setView([10.3346, 125.1709], 10); // Centered on Southern Leyte, adjusted zoom level

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        function addMarker(latitude, longitude, title) {
            var marker = L.marker([latitude, longitude]).addTo(map);
            marker.bindPopup(title).openPopup();
        }

        // Add the selected landmark as a marker
        var selectedLandmark = @json($selectedLandmark);
        //addMarker(selectedLandmark.latitude, selectedLandmark.longitude, selectedLandmark.Landmark);

        var key1 = "SEAT NO. 1";
        if (localStorage.getItem(key1) !== null && localStorage.getItem(key1) !== ""){
            var coordinates = localStorage.getItem("SEAT NO. 1").split(',');
            addMarker(coordinates[1], coordinates[0], coordinates[2]);
        }

        var key2 = "SEAT NO. 2";
        if (localStorage.getItem(key2) !== null && localStorage.getItem(key2) !== ""){
            var coordinates = localStorage.getItem("SEAT NO. 2").split(',');
            addMarker(coordinates[1], coordinates[0], coordinates[2]);
        }

        // Create a route
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
                    styles: [{ color: 'red', opacity: 0.7, weight: 5, interactive: false }]
                },
                show: false, // Set this option to hide route instructions
                fitSelectedRoutes: false // Disable automatic zoom adjustment
            }).addTo(map);
        }


        function getUserLocation() {
            if ('geolocation' in navigator) {
                navigator.geolocation.getCurrentPosition(
                    function (position) {
                        var userLat = position.coords.latitude;
                        var userLng = position.coords.longitude;
                        var userLocation = L.latLng(userLat, userLng);

                        // Add a marker for the user's current location
                        var userMarker = L.marker(userLocation).addTo(map);
                        userMarker.bindPopup("Your Location").openPopup();

                        // Update the map's view to the user's location
                        map.setView(userLocation, 15); // You can adjust the zoom level (15 in this case) as needed.
                    },
                    function (error) {
                        console.error("Error getting location:", error);
                    }
                );
            } else {
                alert("Geolocation is not available in your browser.");
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
            createRoute("Maasin", [10.116513620264532, 124.89404637267265], [10.132195394128429, 124.83481102052342], function() {
            getUserLocation();
            });
        }
        createRoutes();

        // Call the createRoutes() function to create routes
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
        // Prompt the user for a password
        var password = prompt("Please enter the password:");

        // Check if the entered password is correct
        if (password === "123") {
            // Redirect to the history.blade.php URL
            window.location.href = "http://127.0.0.1:8000/table";
        } else {
            alert("Incorrect password. Access denied.");
        }
        });

        // Add an event listener to the map to stop click event propagation
        document.getElementById("map").addEventListener("click", function (e) {
            e.stopPropagation();
        });

        document.getElementById("currentLocationButton").addEventListener("click", function () {
            map.dragging.disable();
            map.touchZoom.disable();
            map.doubleClickZoom.disable();
            map.scrollWheelZoom.disable();
            map.boxZoom.disable();
            // Your getUserLocation() code here
          
        });


    </script>

    <!-- MapQuest API script -->
        <script>
            // Include the MapQuest JavaScript API script
            // Make sure to replace 'YOUR_API_KEY' with your actual MapQuest API key
            const apiKey = 'kk7XjYNjvXIAGxlKuGN6lIeWPU9XCVBG';
            const script = document.createElement('script');
            script.src = https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js?key=${apiKey};
            script.async = true;
            script.defer = true;
            script.onload = initializeMap;
            document.head.appendChild(script);

            function initializeMap() {
                L.mapquest.key = apiKey;

                // Do not create a map here; the Leaflet map is already created

                // Add a marker for the selected landmark using the MapQuest API
                var selectedLandmark = @json($selectedLandmark);
                var map = L.mapquest.map('map');
                L.mapquest.textMarker([selectedLandmark.latitude, selectedLandmark.longitude], {
                    text: selectedLandmark.Landmark,
                    position: 'right',
                    type: 'marker',
                    icon: {
                        primaryColor: '#3333FF',
                        secondaryColor: '#3333FF',
                        size: 'sm'
                    }
                }).addTo(map);
            }
        </script>

</body>
</html>