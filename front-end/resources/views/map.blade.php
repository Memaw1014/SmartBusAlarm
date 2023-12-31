<!DOCTYPE html>
<html>
<head>
    <title>Real-Time Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>
<body>
    <div id="map" style="height: 700px;"></div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        var map = L.map('map').setView([10.45210074119306, 124.93572129667415], 2);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var customMarkerIcon = L.icon({
            iconUrl: 'path/to/custom-icon.png', 
            iconSize: [25, 25] 
        });

        function getUserLocation() {
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var userLat = position.coords.latitude;
                    var userLng = position.coords.longitude;

                    map.setView([userLat, userLng], 10); 

                    var userMarker = L.marker([userLat, userLng]).addTo(map);

                    var customMarker = L.marker([10.383980903512677, 124.98287132017876], { marker: customMarker }).addTo(map);
                    customMarker.bindPopup("Sogod").openPopup();

                    var customMarker = L.marker([10.3545, 124.9707], { marker: customMarker }).addTo(map);
                    customMarker.bindPopup("Bontoc").openPopup();

                    var customMarker = L.marker([10.3079, 124.9802], { marker: customMarker }).addTo(map);
                    customMarker.bindPopup("Tomas Oppus").openPopup();

                    var customMarker = L.marker([10.2191, 124.9788], { marker: customMarker }).addTo(map);
                    customMarker.bindPopup("Juangon").openPopup();

                    var customMarker = L.marker([10.2006, 124.9799], { marker: customMarker }).addTo(map);
                    customMarker.bindPopup("Timba").openPopup();

                    var customMarker = L.marker([10.1811, 124.9855], { marker: customMarker }).addTo(map);
                    customMarker.bindPopup("San Vicente").openPopup();

                    var customMarker = L.marker([10.1585, 125.0011], { marker: customMarker }).addTo(map);
                    customMarker.bindPopup("Malitbog").openPopup();

                    var customMarker = L.marker([10.0302, 125.0168], { marker: customMarker }).addTo(map);
                    customMarker.bindPopup("Padre Burgos").openPopup();

                    var customMarker = L.marker([10.0755, 124.9414], { marker: customMarker }).addTo(map);
                    customMarker.bindPopup("Macrohon").openPopup();

                    var customMarker = L.marker([10.1346, 124.8445], { marker: customMarker }).addTo(map);
                    customMarker.bindPopup("Maasin City").openPopup();

                    userMarker.bindPopup("Your Location").openPopup();
                    
                }, function (error) {
                    console.error("Error getting user location:", error);
                    alert("Unable to retrieve your location.");
                });
            } else {
                alert("Geolocation is not supported by your browser.");
            }
        }
        document.addEventListener("DOMContentLoaded", getUserLocation);
    </script>
</body>
</html>
