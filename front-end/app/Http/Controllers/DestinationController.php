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

        return view('map', compact('message1','message2'));
    }

    public function map()
    {
        $googleMapsApiKey = 'YOUR_GOOGLE_MAPS_API_KEY';

        return view('map', ['googleMapsApiKey' => $googleMapsApiKey]);
    }

    public function selectionPost(Request $request)
    {
        // Get the selected seat value from the form
        $selectedSeat = $request->input('selected_seat');

        // Define variables to store messages and redirection URLs
        $message = '';
        $redirectTo = '';

        // Perform logic based on the selected seat
        switch ($selectedSeat) {
            case 'seat1':
                // Handle logic for Seat No. 1
                $message = 'You have selected Seat No. 1.';
                $redirectTo = '/destination'; // Example redirection URL
                break;

            case 'seat2':
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
        return redirect()->route('destination.show')->with('message', $message);
    }


    public function submitDestination(Request $request)
    {
        
    }
    
}