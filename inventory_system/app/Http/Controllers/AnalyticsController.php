<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function showAnalytics()
    {
        // Example data (replace with your actual data source)
        $labels = ['Item A', 'Item B', 'Item C'];
        $data = [10, 20, 30];

        return view('analytics', compact('labels', 'data'));
    }
}
