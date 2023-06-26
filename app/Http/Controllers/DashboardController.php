<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::with(['galleries'])
            ->where('users_id', Auth::user()->id)
            ->get();

        return view('pages.dashboard', [
            'product_count' => $products->count(),
            'product_data' => $products,
        ]);
    }
}