<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History; // Replace 'History' with the actual model name for your history records

class HistoryController extends Controller
{
    public function index()
    {
        // Retrieve data from your database using Eloquent
        $historyRecords = History::all(); // Assuming 'History' is the model for your history records

        return view('history', compact('historyRecords'));
    }
}