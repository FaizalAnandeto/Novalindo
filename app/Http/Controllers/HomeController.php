<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CompanySetting;
use App\Models\Portfolio;
use App\Models\Product;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\TeamMember;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->take(6)->get();
        $categories = Category::active()->ordered()->withCount('products')->get();
        $products = Product::active()->featured()->ordered()->with('category')->take(8)->get();
        if ($products->isEmpty()) {
            $products = Product::active()->ordered()->with('category')->take(8)->get();
        }
        $portfolios = Portfolio::active()->ordered()->take(6)->get();
        $testimonials = Testimonial::active()->ordered()->take(6)->get();

        return view('home', compact(
            'services',
            'categories',
            'products',
            'portfolios',
            'testimonials'
        ));
    }

    public function about()
    {
        $teamMembers = TeamMember::active()->ordered()->get();
        return view('about', compact('teamMembers'));
    }

    public function services()
    {
        $services = Service::active()->ordered()->get();
        return view('services', compact('services'));
    }

    public function portfolio()
    {
        $portfolios = Portfolio::active()->ordered()->get();
        return view('portfolio', compact('portfolios'));
    }

    public function contact()
    {
        return view('contact');
    }
}
