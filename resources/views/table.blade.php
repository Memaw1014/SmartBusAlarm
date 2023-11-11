<!DOCTYPE html>
<html>
<head>
    <title>TableForm - Data Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .search-container {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-bottom: 10px;
        }

        .search-container label, .search-container input, .search-container button {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div style="text-align: center;">
        <h1>Data Table</h1>
    </div>
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div>
            <button onclick="location.href = '/login';">Admin</button>
            <button id="goBackButton">Go to Map</button>
        </div>
        <!-- Search container -->
        <div class="search-container">
            <label for="searchCreatedAt">Search Created Date:</label>
            <input type="date" id="searchCreatedAt" name="searchCreatedAt">
            <button onclick="searchByCreatedAt()">Search</button>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Selected Seat</th>
                <th>From Municipality</th>
                <th>To Municipality</th>
                <th>To Barangay</th>
                <th>Landmark</th>
                <th>latitude</th>
                <th>longitude</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($form_data as $data)
                <tr>
                    <td>{{ $data->selected_seat }}</td>
                    <td>{{ $data->FROM_Municipality }}</td>
                    <td>{{ $data->TO_Municipality }}</td>
                    <td>{{ $data->Barangay }}</td>
                    <td>{{ $data->Landmark }}</td>
                    <td>{{ $data->latitude }}</td>
                    <td>{{ $data->longitude }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        // Add an event listener to the "Go to Map" button
        document.getElementById("goBackButton").addEventListener("click", function () {
            // Go back to the previous page
            window.history.back();
        });

        function searchByCreatedAt() {
            // Get the value entered by the user in the search input
            var searchDate = document.getElementById("searchCreatedAt").value;

            // Loop through each row in the table body
            var table = document.querySelector("table tbody");
            var rows = table.getElementsByTagName("tr");
            for (var i = 0; i < rows.length; i++) {
                // Get the cell with the "Created" date in this row
                var createdCell = rows[i].getElementsByTagName("td")[7]; // Assuming "Created" is the 8th column (index 7)

                // Check if the created date matches the search date
                if (createdCell) {
                    var createdDate = new Date(createdCell.textContent);
                    var searchDateObj = new Date(searchDate);
                    if (createdDate.toDateString() === searchDateObj.toDateString()) {
                        // If it matches, show the row; otherwise, hide it
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>
