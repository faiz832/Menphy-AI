<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $diagnosis = Diagnosis::with('user', 'mentalDisorder', 'recommendation')->get();
        return view('dashboard');
    }
}
