<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    
    //  Display the user's profile form.
     
    public function edit(Request $request)
    {
        return view(
            'profile.edit',
            [
                'user' => $request->user(),
            ]
        );
    }

    
    //  Update the user's profile information.
     
    public function update(Request $request)
    {

        $user = $request->user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'password' => 'nullable|min:6|confirmed',
        ]);


        $nameImage = $user->image;

        if ($request->boolean('remove_image')) {
            if ($nameImage) {
                Storage::disk('public')->delete('users/' . $nameImage);
            }
            $nameImage = null;
        }

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete('users/' . $user->image);
            }
            $nameImage = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('users', $nameImage, 'public');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $nameImage;

        if ($request->filled('password')) {
            $user->password = $request->password;
        }

        $user->save();

        return redirect(route('profile.edit'))->with('success', 'Profile updated successfully');
    }

    
    //   Delete the user's account.
    
    public function destroy(Request $request)
    {
        $request->validate([
            'password' => 'required|current_password',
        ]);

        $user = $request->user();

        if ($user->image) {
            Storage::disk('public')->delete('users/' . $user->image);
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
