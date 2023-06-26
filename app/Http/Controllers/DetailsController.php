<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;



class DetailsController extends Controller
{
       /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $id)
{
    $product = Product::with(['galleries', 'user'])
        ->where('slug', $id)
        ->firstOrFail();

    return view('pages.details', [
        'product' => $product
    ]);
}
}