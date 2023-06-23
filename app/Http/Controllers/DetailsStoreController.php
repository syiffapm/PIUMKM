<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        $users = User::first(); // Ganti ini dengan metode pengambilan data yang sesuai (misalnya, berdasarkan ID)

        return view('pages.details-store', [
           'store_name' => $users->store_name,
        'nama' => $users->name,
        'description' => $users->description ?? '', // Jika description tidak ada, berikan nilai default kosong
        'address_one' => $users->address_one ?? '', // Jika address_one tidak ada, berikan nilai default kosong
        'phone_number' => $users->phone_number ?? '', // Jika phone_number tidak ada, berikan nilai default kosong
        'email' => $users->email ?? '',
        'location' => $users->location ?? '',
        ]);
    }
}