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
    <audio id="myAudio">
  <source src="samsung_notification.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
<p>Click the buttons to play or pause the audio.</p>

<button onclick="playAudio()" type="button">Play Audio</button>
<button onclick="pauseAudio()" type="button">Pause Audio</button> 

<script>
var x = document.getElementById("myAudio"); 

function playAudio() { 
  x.play(); 
} 

function pauseAudio() { 
  x.pause(); 
} 
</script>
</body>
</html>