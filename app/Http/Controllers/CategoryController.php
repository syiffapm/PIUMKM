<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   public function index(Request $request)
    {
        $categories = Category::all();
        $product = Product::paginate($request->input('limit', 32));

        return view('pages.category',[
            'categories' => $categories,
            'products' => $product
        ]);
    }
  

}