<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Diagnosis;
use App\Models\AssessmentQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssessmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $assessments = $user->assessments()->with('diagnosis.mentalDisorder')->latest()->get();
        return view('assessments.index', compact('assessments'));
    }

    public function create(Diagnosis $diagnosis)
    {
        // Check if user has already taken an assessment for this diagnosis today
        $lastAssessment = $diagnosis->assessments()
            ->where('user_id', Auth::id())
            ->whereDate('created_at', today())
            ->first();

        if ($lastAssessment) {
            return redirect()->route('assessments.show', $lastAssessment)
                ->with('warning', 'You have already taken an assessment for this diagnosis today.');
        }

        $questions = AssessmentQuestion::where('mental_disorder_id', $diagnosis->mental_disorder_id)->get();
        return view('assessments.create', compact('diagnosis', 'questions'));
    }

    public function store(Request $request, Diagnosis $diagnosis)
    {
        $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|integer|min:1|max:5',
        ]);

        $answers = $request->input('answers');
        $totalQuestions = count($answers);
        $totalScore = array_sum($answers);
        $percentageImprovement = ($totalScore / ($totalQuestions * 5)) * 100;

        $assessment = new Assessment([
            'diagnosis_id' => $diagnosis->id,
            'user_id' => Auth::id(),
            'score' => $totalScore,
            'percentage_improvement' => $percentageImprovement,
        ]);

        $assessment->save();

        return redirect()->route('assessments.show', $assessment);
    }

    public function show(Assessment $assessment)
    {
        if ($assessment->user_id !== Auth::user()->id) {
            return view('errors.forbidden')->with('message', '403 | You do not have permission to access this page.');
        }

        return view('assessments.show', compact('assessment'));
    }
}
