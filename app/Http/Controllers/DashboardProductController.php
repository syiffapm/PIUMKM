<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\ProductGallery;
use App\Models\User;

class DashboardProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['galleries', 'category'])
            ->where('users_id', Auth::user()->id)
            ->get();

        return view('pages.dashboard-product', [
            'products' => $products, // Menambahkan data produk ke dalam array
        ]);
    }

    public function details(Request $request, $id) // Menambahkan parameter $id pada function details
    {
        $product = Product::with(['galleries','user', 'category'])->findOrFail($id); // Mengambil data produk berdasarkan ID

       $categories = Category::all();
       
        return view('pages.dashboard-products-details', [
            'product' => $product, // Mengirim data produk ke view
            'categories' => $categories
        ]);
    }

    public function uploadGallery(Request $request){
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/product', 'public');

        ProductGallery::create($data);

       return redirect()->route('dashboard-product-details', $request->products_id);

    }

    public function delete(Request $request, $id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('dashboard-product-details', $item->products_id);
    }

    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        return view('pages.dashboard-products-create',[
            'users' => $users,
            'categories' => $categories
        ]);
    }

   public function store(ProductRequest $request)
{
    $data = $request->all();

   $data['slug'] = Str::slug($request->input('name'));


    $product = Product::create($data);

       $gallery = [
    'products_id' => $product->id,
    'photos' => $request->file('photos')->store('assets/product', 'public')
];
        ProductGallery::create($gallery);
    

    return redirect()->route('dashboard-product');
}

public function update(ProductRequest $request, $id)
{
    $data = $request->all();

    $item = Product::findOrFail($id);

    $data['slug'] = Str::slug($request->name);


    $item->update($data);
    return redirect()->route('dashboard-product');
}

public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('dashboard-product')->with('success', 'Produk berhasil dihapus');
}


}