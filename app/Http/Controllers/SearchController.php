<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = Diagnosis::where('component', 'like', "%{$query}%")
            ->with(['category.version'])
            ->get()
            ->groupBy(function ($component) {
                return $component->category->version->version;
            })
            ->map(function ($versionGroup) {
                return $versionGroup->groupBy(function ($component) {
                    return $component->category->category;
                });
            });

        return response()->json($results);
    }
}
