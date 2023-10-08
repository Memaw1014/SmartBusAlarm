<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destination</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>
<body>
    <!-- Map container -->
    <div id="map" style="height: 400px;"></div>

    <!-- Fare display -->
    <div id="fare">Fare: Calculating...</div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Initialize the Leaflet map
        var map = L.map('map').setView([currentLat, currentLng], 12); // Set the initial view

        // Add a tile layer (e.g., OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Define markers for current location and destination
        var currentLocationMarker = L.marker([currentLat, currentLng]).addTo(map).bindPopup('Current Location');
        var destinationMarker = L.marker([10.3545, 124.9707]).addTo(map).bindPopup('Destination');

        // Calculate distance between locations when the map is ready
        map.on('load', function() {
            var currentLocation = L.latLng(currentLat, currentLng);
            var destination = L.latLng(10.3545, 124.9707);
            var distance = currentLocation.distanceTo(destination) / 1000; // Convert meters to kilometers

            // Define fare calculation method (e.g., $1 per kilometer)
            var farePerKilometer = 1;
            var fare = distance * farePerKilometer;

            // Display fare on the page
            var fareDisplay = document.getElementById('fare');
            fareDisplay.textContent = 'Fare: $' + fare.toFixed(2); // Display fare with two decimal places
        });
    </script>
</body>
</html>
