<?php
namespace App\Http\Controllers;

use App\Models\barangays;
use App\Models\Destination;
use App\Models\from_municipalities;
use App\Models\to_municipalities;
use App\Models\TableForm;
use App\Models\landmarks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DestinationController extends Controller
{
    public function destination(Request $request)
    {
        $selectedSeat = $request->query('selected_seat'); // Retrieve the selected_seat from the query parameters
        $from_municipalities = from_municipalities::all();
        $to_municipalities = to_municipalities::all();
        $barangays = barangays::all();
        $landmarks = landmarks::all();
        return view('destination', compact('selectedSeat', 'from_municipalities', 'to_municipalities', 'barangays', 'landmarks'));
    }


    public function destinationPost(Request $request)
    {
        $validatedData = $request->validate([
            'selected_seat' => 'required',
            'FROM_Municipality' => 'required',
            'TO_Municipality' => 'required',
            'Barangay' => 'required'
        ]);
        TableForm::create($validatedData);
        
        // Redirect to the table view
        return redirect()->route('map')->with('form_data', $validatedData);

        $data['selected_seat'] = $request->selected_seat;
        $data['FROM_Municipality'] = $request->FROM_Municipality;
        $data['TO_Municipality'] = $request->TO_Municipality;
        $data['Barangay'] = $request->Barangay;
        $data['landmarks'] = $request->landmarks;


        $destination = Destination::create($data);

        if (!$destination) {
            return redirect(route('destination'))->with("error", "Registration failed, try again.");
        }
        return view('map');
    }

    public function map()
    {
        $googleMapsApiKey = 'YOUR_GOOGLE_MAPS_API_KEY';

        return view('map', ['googleMapsApiKey' => $googleMapsApiKey]);
    }

    public function selectionPost(Request $request)
    {
        $selected_seat = $request->input('selected_seat');
        $message = '';
        $redirectTo = '';

        
        // Redirect back or return a response
        return redirect()->route('show-destination', ['selected_seat' => $selected_seat])->with('message', $message);
    }

    public function displayTable()
    {
        $tableFormData = TableForm::all();
        return view('table', ['form_data' => $tableFormData]);
    }
}