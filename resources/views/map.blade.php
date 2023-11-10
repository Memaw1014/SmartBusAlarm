<!DOCTYPE html>
<html>
<head>
    <title>Real-Time Map</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

   
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script>

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        var longitude = '';
        var latitude = '';
       

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
        var key3 = "SEAT NO. 3";
        if (localStorage.getItem(key3) !== null && localStorage.getItem(key3) !== ""){
            var coordinates = localStorage.getItem("SEAT NO. 3").split(',');
            addMarker(coordinates[1], coordinates[0], coordinates[2]);
        }

        var key4 = "SEAT NO. 4";
        if (localStorage.getItem(key4) !== null && localStorage.getItem(key4) !== ""){
            var coordinates = localStorage.getItem("SEAT NO. 4").split(',');
            addMarker(coordinates[1], coordinates[0], coordinates[2]);
        }

        // Create a route
        function getUserLocation() {
            if ('geolocation' in navigator) {
                getCurrentLocation()
                navigator.geolocation.getCurrentPosition(
                    function (position) {
                        var userLat = position.coords.latitude;
                        var userLng = position.coords.longitude;
                        console.log('coor',userLat,userLng);
                       // console.log('coor2',latitude,longitude);

                        

                       // var userLocation = L.latLng(userLat, userLng);
                        var userLocation = L.latLng(latitude,longitude);
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

        function createRoute(routeName, startCoords, endCoords) {
            var startIcon = L.icon({
                iconUrl: 'start-icon.png', // Replace with the URL of your custom start icon
                iconSize: [32, 32], // Adjust the size of the icon as needed
            });

            var endIcon = L.icon({
                iconUrl: 'end-icon.png', // Replace with the URL of your custom end icon
                iconSize: [32, 32], // Adjust the size of the icon as needed
            });

            var start = L.latLng(startCoords[0], startCoords[1]);
            var end = L.latLng(endCoords[0], endCoords[1]);

            var route = L.Routing.control({
                waypoints: [
                    {
                        latLng: start,
                        icon: startIcon, // Use the custom start icon
                        // You can also add other options like iconAnchor, popup, etc.
                    },
                    {
                        latLng: end,
                        icon: endIcon, // Use the custom end icon
                        // You can also add other options like iconAnchor, popup, etc.
                    }
                ],
                routeWhileDragging: true,
                lineOptions: {
                    styles: [{ color: 'red', opacity: 0.7, weight: 7, interactive: false }]
                },
                draggableWaypoints: false,
                show: false,
                fitSelectedRoutes: false
            }).addTo(map);
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


        function createRoutesNoSignal() {
                createTextMarker("No Signal1", [10.347115636863771, 124.96777850174848], [10.314909342918405, 124.97474175643858], "No Signal1");
                createTextMarker("No Signal2", [10.241566072276722, 124.97972676426492], [10.16721543096064, 124.99693621644334], "No Signal2");
                createTextMarker("No Signal3", [10.130435144521742, 125.00777819984935], [10.035891204344082, 125.02094230453896], "No Signal3");
                createTextMarker("No Signal4", [10.089373279625203, 124.9248845881228], [10.094848779603664, 124.90162887157325], "No Signal4", function() {
                    getUserLocation();
                });
            }

            function createTextMarker(title, startCoords, endCoords, text, onClick) {
                createMarker(" " + title, startCoords);
                createMarker(" " + title, endCoords);

                function createMarker(markerTitle, coordinates) {
                    var marker = L.marker(coordinates, {
                        icon: L.divIcon({
                            className: 'text-marker',
                            html: markerTitle,
                            iconSize: [50, 20] // Adjust the size as needed
                        })
                    }).addTo(map);

                    if (onClick) {
                        marker.on('click', onClick);
                    }

                    marker.bindPopup(markerTitle).openPopup();
                }
            }

            // Add custom CSS for the text markers
            var customCss = `
                .text-marker {
                    text-align: center;
                    color: #000;
                    font-weight: bold;
                    font-size: 8px;
                }
            `;

            var styleTag = document.createElement('style');
            styleTag.type = 'text/css';
            styleTag.appendChild(document.createTextNode(customCss));
            document.head.appendChild(styleTag);

            createRoutesNoSignal();


        // Call the createRoutes() function to create routes
        document.addEventListener("DOMContentLoaded", getUserLocation);
        // Add event listener to the "GET LOCATION" button
        document.getElementById("currentLocationButton").addEventListener("click", function () {
            getUserLocation();
        });

        // Add event listener to the BACK button
document.getElementById("backButton").addEventListener("click", function () {
    var passcodeUsed = localStorage.getItem("passcodeUsed");

    if (passcodeUsed === "123") {
        var seat1Occupied = localStorage.getItem("SEAT NO. 1") && localStorage.getItem("SEAT NO. 1").trim() !== "";
        var seat2Occupied = localStorage.getItem("SEAT NO. 2") && localStorage.getItem("SEAT NO. 2").trim() !== "";
        
        if (seat1Occupied && seat2Occupied) {
            alert("Both SEAT NO. 1 and SEAT NO. 2 are occupied. You cannot go back.");
        } else {
            // Redirect to the destination if not occupied
            window.location.href = "http://127.0.0.1:8000/1";
        }
    } else if (passcodeUsed === "456") {
        var seat3Occupied = localStorage.getItem("SEAT NO. 3") && localStorage.getItem("SEAT NO. 3").trim() !== "";
        var seat4Occupied = localStorage.getItem("SEAT NO. 4") && localStorage.getItem("SEAT NO. 4").trim() !== "";
        
        if (seat3Occupied && seat4Occupied) {
            alert("Both SEAT NO. 3 and SEAT NO. 4 are occupied. You cannot go back.");
        } else {
            // Redirect to the destination if not occupied
            window.location.href = "http://127.0.0.1:8000/2";
        }
    } else {
        alert("Passcode information not available. Cannot determine the destination.");
    }
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




        function getCurrentLocation(){
            $.ajax({
                url: "/getcurrentlocation",
                type: "post",
                // data: values ,
                success: function (response) {
                    console.log('location:',response);
                    if(response){
                        longitude =  JSON.parse(response.data.longitude)
                        latitude = JSON.parse(response.data.latitude)
                    }


                // You will get response from your PHP page (what you echo or print)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  console.log(textStatus, errorThrown);
                }
            });
        }


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
        </script>*
</body>
</html>