<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Buku;
use App\Models\Quote;
use App\Models\Profile;
use App\Models\Galeri;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all published articles
        $articles = Article::where('is_published', true)->latest()->get();
        
        // Fetch all books (using $books as per user request)
        $books = Buku::latest()->get();
        
        // Fetch active quotes
        $quotes = Quote::where('is_active', true)->latest()->get();
        
        // Fetch profile data
        $profile = Profile::first();
        
        // Fetch gallery data (if still needed)
        $galeris = Galeri::latest()->get();

        return view('home', compact('articles', 'books', 'quotes', 'profile', 'galeris'));
    }

    public function show(Article $article)
    {
        return view('artikel-detail', ['artikel' => $article]);
    }

    public function storeComment(Request $request, Article $article)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'isi_komentar' => 'required|string|max:1000',
        ]);

        $article->comments()->create([
            'nama' => $request->nama,
            'isi_komentar' => $request->isi_komentar,
            'is_approved' => false, // Default tertunda untuk moderasi
        ]);

        return back()->with('success', 'Terima kasih, pesan Anda sedang menunggu persetujuan Mbak Nana.');
    }
}
