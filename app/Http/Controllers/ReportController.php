<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\home_listings;

class ReportController extends Controller
{
    public function showForm($type, $id)
    {
        $reportable = $type === 'user' ? User::findOrFail($id) : home_listings::findOrFail($id);
        return view('reports.form', compact('type', 'reportable'));
    }
}
