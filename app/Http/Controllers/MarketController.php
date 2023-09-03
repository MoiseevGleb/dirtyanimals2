<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function index()
    {
        $slides = glob('storage/images/slider/*');

        $products = Product::query()
            ->select(['id', 'title', 'price', 'img'])
            ->paginate(12);

        return view('market.index', compact('products', 'slides'));
    }

    public function show(Product $product)
    {
        return view('market.show', compact('product'));
    }
}
