<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(4);
        return view('home', compact('articles'));
    }
}
