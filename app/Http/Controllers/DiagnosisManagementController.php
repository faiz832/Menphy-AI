<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use Illuminate\Support\Facades\Auth;

class DiagnosisManagementController extends Controller
{
    public function index()
    {
        $diagnoses = Diagnosis::with('mentalDisorder', 'recommendation')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('diagnosis.index', compact('diagnoses'));
    }
}
