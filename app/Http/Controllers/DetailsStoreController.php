<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class DetailsStoreController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.details-store');
    }

    
public function showProfile()
{
    $user = User::first(); // Ubah ini untuk mengambil user yang spesifik sesuai kebutuhan Anda

    if (!$user) {
        // Tangani kasus ketika user tidak ditemukan
        // Misalnya, tampilkan pesan error atau redirect ke halaman lain
    }

    $products = Product::all();

    return view('pages.details-store', [
        'store_name' => $user->store_name,
        'nama' => $user->name,
        'photo_profile' => $user->photo_profile,
        'description' => $user->description ?? '', // Berikan nilai default jika description null
        'address_one' => $user->address_one ?? '', // Berikan nilai default jika address_one null
        'phone_number' => $user->phone_number ?? '', // Berikan nilai default jika phone_number null
        'email' => $user->email ?? '',
        'location' => $user->location ?? '',
        'products' => $products ?? ''
    ]);
}



}