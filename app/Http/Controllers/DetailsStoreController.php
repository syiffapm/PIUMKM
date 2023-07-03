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

public function showProfile($userId)
{
    $user = User::findOrFail($userId); // Find the user based on the provided ID

    $products = $user->products; // Retrieve the products for the user

    return view('pages.details-store', [
        'store_name' => $user->store_name,
        'nama' => $user->name,
        'photo_profile' => $user->photo_profile,
        'description' => $user->description ?? '',
        'address_one' => $user->address_one ?? '',
        'phone_number' => $user->phone_number ?? '',
        'email' => $user->email ?? '',
        'location' => $user->location ?? '',
        'user' => $user,
        'products' => $products ?? []
    ]);
}


}