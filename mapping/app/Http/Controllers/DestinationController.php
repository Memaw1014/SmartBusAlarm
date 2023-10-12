<?php
namespace App\Http\Controllers;

use App\Models\barangays;
use App\Models\Destination;
use App\Models\from_municipalities;
use App\Models\to_municipalities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DestinationController extends Controller
{
    public function destination(Request $request)
    {
        $from_municipalities = from_municipalities::all();
        $to_municipalities = to_municipalities::all();
        $barangays = barangays::all();
        $selectedSeat = $request->query('selected_seat'); // Retrieve the selected_seat from the query parameters
        return view('destination', compact('from_municipalities', 'to_municipalities', 'barangays', 'selectedSeat'));
    }


    public function destinationPost(Request $request)
    {
        $request->validate([
            'FROM_Municipality' => 'required',
            'TO_Municipality' => 'required',
            'Barangay' => 'required',
            'selected_seat' => 'required',
        ]);

        $data['FROM_Municipality'] = $request->FROM_Municipality;
        $data['TO_Municipality'] = $request->TO_Municipality;
        $data['Barangay'] = $request->Barangay;
        $data['selected_seat'] = $request->selected_seat;

        $destination = Destination::create($data);

        if (!$destination) {
            return redirect(route('destination'))->with("error", "Registration failed, try again.");
        }
        $message1 = "FROM_Municipality: " . $data['FROM_Municipality']; 
        $message2 = "\nTO_Municipality: " . $data['TO_Municipality']; 
        $message3 = "\nBarangay: " . $data['Barangay'];
        $message4 = "\nselected_seat: " . $data['selected_seat'];

        return view('map', compact('message1','message2', 'message3', 'message4'));
    }

    public function map()
    {
        $googleMapsApiKey = 'YOUR_GOOGLE_MAPS_API_KEY';

        return view('map', ['googleMapsApiKey' => $googleMapsApiKey]);
    }

    public function selectionPost(Request $request)
{
    // Get the selected seat value from the form
    $selected_seat = $request->input('selected_seat');

    // Define variables to store messages and redirection URLs
    $message = '';
    $redirectTo = '';

    // Perform logic based on the selected seat
    switch ($selected_seat) {
        case 'SEAT 1':
            // Handle logic for Seat No. 1
            $message = 'You have selected Seat No. 1.';
            $redirectTo = '/destination'; // Example redirection URL
            break;

        case 'SEAT 2':
            // Handle logic for Seat No. 2
            $message = 'You have selected Seat No. 2.';
            $redirectTo = '/destination'; // Example redirection URL
            break;

        // Add more cases for other seat options if needed

        default:
            // Handle the default case if the selected seat is not recognized
            $message = 'Invalid seat selection.';
            $redirectTo = '/selection'; // Redirect back to the selection page
            break;
    }

    // Redirect back or return a response
    return redirect()->route('destination.show', ['selected_seat' => $selected_seat])->with('message', $message);
}

    public function submitDestination(Request $request)
    {
        
    }
    
}