<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DetailsController extends Controller
{
    /**
     * Show the product details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $id)
    {
        $product = Product::with(['galleries', 'user'])
            ->where('slug', $id)
            ->firstOrFail();

        $user = $product->user;

        return view('pages.details', [
            'product' => $product,
            'user' => $user
        ]);
    }
}