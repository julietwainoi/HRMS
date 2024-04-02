<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveCodes;
class deleteController extends Controller
{
    public function deleteAllRecords()
    {
        // Delete all records from the table
        LeaveCodes::truncate();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'All records deleted successfully.');
    }
}
