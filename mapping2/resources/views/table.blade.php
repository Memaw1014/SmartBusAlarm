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
    </style>
</head>
<body>
    <h1>Data Table</h1>
    <div style="text-align: right;">
        <button onclick="location.href = '/login';">Admin</button>
        <button onclick="location.href = '/map';">Go to Map</button>
    </div>
    <table>
        <thead>
            <tr>
                <th>Selected Seat</th>
                <th>From Municipality</th>
                <th>To Municipality</th>
                <th>To Barangay</th>
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
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
