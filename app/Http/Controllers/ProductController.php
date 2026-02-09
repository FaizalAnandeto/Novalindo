<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::active()->ordered()->withCount('products')->get();
        $products = Product::active()->ordered()->with('category')->paginate(12);
        $selectedCategory = null;

        return view('products.index', compact('categories', 'products', 'selectedCategory'));
    }

    public function category(Category $category)
    {
        $categories = Category::active()->ordered()->withCount('products')->get();
        $products = $category->products()->active()->ordered()->paginate(12);
        $selectedCategory = $category;

        return view('products.index', compact('categories', 'products', 'selectedCategory'));
    }

    public function show(Product $product)
    {
        $product->load('category');
        $relatedProducts = Product::active()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }
}
