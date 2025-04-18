<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Tambahkan ini
use App\Models\ArticleNews; // Tambahkan ini
use App\Models\BannerAdvertisement;
use App\Models\Author;

class FrontController extends Controller
{
    public function index() {
        $categories = Category::all();
        
        $articles = ArticleNews::with(['category'])
        ->where('is_featured', 'featured')
        ->latest()
        ->take(3)
        ->get();

        $featured_articles = ArticleNews::with(['category'])
        ->where('is_featured', 'featured')
        ->inRandomOrder()
        ->take(3)
        ->get();

        $authors = Author::all();

        $bannerads = BannerAdvertisement::where('is_active', 'active')
        ->where('type', 'banner')
        ->inRandomOrder()
        // ->take(1)
        ->first();

        $entertaiment_articles = ArticleNews::whereHas('category', function ($query){
            $query->where('name', 'Entertaiment');
        })
        ->where('is_featured', 'not_featured')
        ->latest()
        ->take(6)
        ->get();

        $entertaiment_featured_articles = ArticleNews::whereHas('category', function ($query){
            $query->where('name', 'Entertaiment');
        })
        ->where('is_featured', 'featured')
        ->inRandomOrder()
        ->first();

        $olahraga_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Olahraga');
        })
        ->where('is_featured', 'not_featured')
        ->latest()
        ->take(6)
        ->get();
        
        // Artikel Olahraga Featured
        $olahraga_featured_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Olahraga');
        })
        ->where('is_featured', 'featured')
        ->inRandomOrder()
        ->first();
        

        return view('front.index', compact('categories', 'articles', 'authors', 'featured_articles', 'bannerads', 'entertaiment_articles', 'entertaiment_featured_articles', 'olahraga_articles', 'olahraga_featured_articles'));
    }


    public function category(Category $category) {
        $categories = Category::all();
        $bannerads = BannerAdvertisement::where('is_active', 'active')
        ->where('type', 'banner')
        ->inRandomOrder()
        // ->take(1)
        ->first();
        return view('front.category', compact('category', 'categories', 'bannerads'));
    }

    public function search(Request $request) {

        $request->validate([
            'keyword' => ['required', 'string', 'max:255'],
        ]);
        

        $categories = Category::all();

        $keyword = $request->keyword;

        $articles = ArticleNews::with(['category'])
        ->where('name', 'like', '%' . $keyword . '%')->paginate(6);

        return view('front.search', compact('articles', 'keyword', 'categories'));
    }

    public function details(ArticleNews $articleNews){

        $categories = Category::all();

        $articles = ArticleNews::with(['category'])
        ->where('is_featured', 'featured')
        ->where('id', '!=', $articleNews->id)
        ->latest()
        ->take(3)
        ->get();

        $bannerads = BannerAdvertisement::where('is_active', 'active')
        ->where('type', 'banner')
        ->inRandomOrder()
        // ->take(1)
        ->first();

        $square_ads = BannerAdvertisement::where('type', 'square')
        ->where('is_active', 'active')
        ->inRandomOrder()
        ->take(2)
        ->get();

    if ($square_ads->count() >= 2) {
        $square_ads_1 = $square_ads[0];
        $square_ads_2 = $square_ads[1];
    } elseif ($square_ads->count() === 1) {
        $square_ads_1 = $square_ads->first();
        $square_ads_2 = null;  // Tidak ada banner kedua
    } else {
        $square_ads_1 = null;  // Tidak ada banner
        $square_ads_2 = null;
    }

    return view('front.details', compact('square_ads_1', 'square_ads_2', 'articleNews', 'categories', 'articles', 'bannerads'));

    }

    public function shop()
    {
        $categories = Category::all(); // Mengambil semua kategori dari database
        return view('front.shop', compact('categories'));
    }

    public function seller()
    {
        $categories = Category::all(); // Mengambil semua kategori dari database
        return view('front.seller', compact('categories'));
    }
}
