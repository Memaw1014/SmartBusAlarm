<?php
namespace App\Http\Controllers;

use App\Models\barangays;
use App\Models\Destination;
use App\Models\Municipalities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DestinationController extends Controller
{
    public function destination()
    {
        $municipalities = Municipalities::all();
        $barangays = barangays::all();
        return view('destination', compact('barangays', 'municipalities'));
    }

    public function destinationPost(Request $request)
    {
        $request->validate([
            'Municipality' => 'required',
            'Barangay' => 'required',
        ]);

        $data['Municipality'] = $request->Municipality;
        $data['Barangay'] = $request->Barangay;

        $destination = Destination::create($data);

        if (!$destination) {
            return redirect(route('destination'))->with("error", "Registration failed, try again.");
        }
        $message1 = "Municipality: " . $data['Municipality']; 
        $message2 = "\nBarangay: " . $data['Barangay'];

        return view('confirmation', compact('message1','message2'));
    }

    public function map()
    {
        $googleMapsApiKey = 'YOUR_GOOGLE_MAPS_API_KEY';

        return view('map', ['googleMapsApiKey' => $googleMapsApiKey]);
    }

    public function selectionPost(Request $request)
    {
        // Validate the form data
        $request->validate([
            'seat_number' => 'required|string', // Assuming 'seat_number' is the name of your button
        ]);

        // Get the selected seat number from the form data
        $selectedSeat = $request->input('seat_number');

        // Perform any specific logic based on the selected seat
        switch ($selectedSeat) {
            case 'Seat No. 1':
                // Handle logic for Seat No. 1
                break;

            case 'Seat No. 2':
                // Handle logic for Seat No. 2
                break;

            // Add more cases for other seat options if needed

            default:
                // Handle the default case if the selected seat is not recognized
                break;
        }

        // Redirect to a relevant page or return a view based on the logic
        return view('confirmation', ['selectedSeat' => $selectedSeat]);
    }

    public function submitDestination(Request $request)
    {
        
    }
    
}
