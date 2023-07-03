<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductGallery;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    { 
        $product = Product::count();
        $user = User::count();
         $products = Product::with(['galleries'])
            ->where('users_id', Auth::user()->id)
            ->get();
        $product_data = Product::all();


        return view('pages.admin.dashboard',[
            'product' => $product,
            'user' => $user,
            'product_data' => $product_data
        ]);
    }
}