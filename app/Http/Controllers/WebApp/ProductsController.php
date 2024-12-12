<?php

namespace App\Http\Controllers\WebApp;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Products/Index');
    }

    public function filter(Request $request)
    {
        $products = Product::query()
            ->when($request->has('category_id'), function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            })
            ->get();

        $categories = Category::all();

        $selectedCategory = $request->get('category_id', null);

        return response()->json([
            'products'         => $products,
            'categories'       => $categories,
            'selectedCategory' => $selectedCategory,
        ]);
    }
}
