<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardSettingController extends Controller
{
    public function store()
    {
        $user = Auth::user();
        $categories = Category::all();

        
        return view('pages.dashboard-settings', [
            'user' => $user,
            'categories' => $categories
        ]);
    }

    public function account()
    {
        $user = Auth::user();

        return view('pages.dashboard-account', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $user = Auth::user();
        $data = $request->except(['photo']); // Exclude photo from data

        // Check if a new photo is uploaded
       if ($request->hasFile('photo')) {
    // Delete the old photo if it exists
    if (isset($user->photo) && Storage::exists($user->photo)) {
        Storage::delete($user->photo);
    }

    // Store the new photo
    $data['photo'] = $request->file('photo')->store('profile-photos', 'public');
}

        $user->update($data);

        return redirect()->route($redirect);
    }

  public function deletePhoto()
{
    $user = Auth::user();

    // Check if the user has a photo
    if ($user->photo) {
        // Delete the current photo
        Storage::delete($user->photo);
        
        // Update the user's photo column to null
        $user->update(['photo' => null]);
    }

    return redirect()->back();
}

}