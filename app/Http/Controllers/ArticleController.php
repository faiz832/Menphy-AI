<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $user = auth()->user();

            // Debug: Periksa apakah file gambar ada
            if ($request->hasFile('image')) {
                $image = $request->file('image');

                // Coba upload dengan nama asli
                $imagePath = $image->store('articles', 'public');
                $validated['image'] = $imagePath;
            }

            // Create article
            $article = $user->articles()->create($validated);

            return redirect()->route('articles.index')
                ->with('success', 'Article created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tangkap error validasi
            return back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {

            return back()
                ->withErrors(['error' => 'Failed to create article: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Debug: Periksa apakah file gambar ada
            if ($request->hasFile('image')) {
                $image = $request->file('image');

                // Hapus gambar lama jika ada
                if ($article->image) {
                    Storage::disk('public')->delete($article->image);
                }

                // Coba upload dengan nama asli
                $imagePath = $image->store('articles', 'public');
                $validated['image'] = $imagePath;
            }

            // Update article
            $article->update($validated);

            return redirect()->route('articles.index')
                ->with('success', 'Article updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tangkap error validasi
            return back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            return back()
                ->withErrors(['error' => 'Failed to update article: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $article = Article::findOrFail($id);

            // Delete image if exists
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }

            // Delete article
            $article->delete();

            return redirect()->route('articles.index')
                ->with('success', 'Article deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
