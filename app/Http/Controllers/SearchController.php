<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = Article::query();

        // Filter based on search keyword, if present
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%");
        }

        // Fetch articles data
        $articles = $query->get()->map(function ($article) {
            return [
                'id' => $article->id,
                'title' => $article->title,
                'created_at' => $article->created_at->format('d M Y'),
            ];
        });

        // Send data as JSON response
        return response()->json($articles);
    }
}
