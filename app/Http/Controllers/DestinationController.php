<?php
namespace App\Http\Controllers;

use App\Models\barangays;
use App\Models\Destination;
use App\Models\from_municipalities;
use App\Models\to_municipalities;
use App\Models\TableForm;
use App\Models\landmarks;
use App\Models\CurrentLocation;
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
                'Barangay' => 'required',
                'Landmark' => 'required',
                'latitude' => 'required',
                'longitude' => 'required'
            ]);
            TableForm::create($validatedData);
            
            $selectedLandmark = $request->input('Landmark');
            $landmark = landmarks::where('Landmark', $selectedLandmark)->first();
            
            return view('map', [
                'selectedLandmark' => $landmark,
            ]);
            
        }

        public function map(Request $request)
        {
            $selectedLandmarkId = $request->input('Landmark'); // Assuming 'Landmark' is the input field name
            // Retrieve the landmark data based on the saved information, for example:
            $selectedLandmark = Landmarks::where('Landmark', $selectedLandmarkId)->first();
            
            return view('map', ['selectedLandmark' => $selectedLandmark]);
        }

        public function selectionPost(Request $request)
        {
            $selected_seat = $request->input('selected_seat');
            $message = '';
            $redirectTo = '';
            // Redirect back or return a response
            return redirect()->route('destination.show', ['selected_seat' => $selected_seat])->with('message', $message);
        }

        public function displayTable(Request $request)
        {
            $tableFormData = TableForm::all();
            $selectedLandmarkId = $request->input('selectedLandmarkId');
            $selectedLandmark = Landmarks::find($selectedLandmarkId);

            // Redirect back to the previous page with a flash message
            return view('table', ['form_data' => $tableFormData, 'selectedLandmark' => $selectedLandmark]);
        }
        
        public function checkRFID(Request $request)
        {
            $rfidPassword = $request->input('rfid_password');

            if ($rfidPassword === '123') {
                return view('selection');
            } elseif ($rfidPassword === '456') {
                return view('selection2');
            } else {
                return view('error');
            }
        }
        public function CurrentLocation(Request $request)
        {
            $currentLocation = CurrentLocation::updateorcreate(['u'=> 1],[
                'longitude' => $request->long,
                'latitude' => $request->lang,
            ]);
            if($currentLocation){
                return response()->json(['message' => 'save' ]);
            }
        }
        public function getCurrentLocation(Request $request)
        {
            $currentLocation = CurrentLocation::where("u" ,1)->first();
            if($currentLocation){
                return response()->json(['data' => $currentLocation ]);
            }
        }
}