<!DOCTYPE html>
<html>
<head>
    <title>History/Inventory</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <h1>History/Inventory</h1>
    <table class="table">
        <thead>
            <tr>
                <th>FROM: Municipality</th>
                <th>TO: Municipality</th>
                <th>TO: Barangay</th>
                <th>Passenger Type</th>
                <th>Bus Fare</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($historyRecords as $record)
                <tr>
                    <td>{{ $record->from_municipality }}</td>
                    <td>{{ $record->to_municipality }}</td>
                    <td>{{ $record->to_barangay }}</td>
                    <td>{{ $record->passenger_type }}</td>
                    <td>{{ $record->bus_fare }}</td>
                    <td>{{ $record->created_at }}</td>
                    <td>{{ $record->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>


