<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destination</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <!-- Leaflet Routing Machine CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
</head>
<body>
    <!-- Map container -->
    <div id="map" style="height: 400px;"></div>

    <!-- Fare display -->
    <div id="fare">Fare: Calculating...</div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Initialize the Leaflet map
        var map = L.map('map').setView([10.45210074119306, 124.93572129667415], 2);

        // Add a tile layer (e.g., OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Define markers for current location and destination
        var currentLocationMarker = L.marker([10.383980903512677, 124.98287132017876]).addTo(map);
        currentLocationMarker.bindPopup("Sogod").openPopup();
        var destinationMarker = L.marker([10.0302, 125.0168]).addTo(map);
        destinationMarker.bindPopup("Padre Burgos").openPopup();

        // Calculate distance between locations when the map is ready
        map.on('load', function() {
            var currentLocation = L.latLng(10.383980903512677, 124.98287132017876);
            var destination = L.latLng(10.0302, 125.0168);
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
