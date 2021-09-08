<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Models\User;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
       // $user = User::findOrFail($user); 

        return view('profiles.index', compact('user'));
    }

    public function edit(User $user) {

        //Authorizing profile policy to protect against 
        //unauthenticated users trying to edit profile.
        $this->authorize('update', $user->profile); 

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user) {

        $this->authorize('update', $user->profile); 

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        //checks if a profile image is uploaded
        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit('1000', '1000');
            $image->save();
        }

        //array_merge is used to combine arrays together to pass data as one body.
        auth()->user()->profile->update(array_merge(
            $data,
            ['image' => $imagePath], //this will override 'image' in $data array
        ));

        //redirects to the authenticated user logged in
        return redirect("/profile/{$user->id}");
    }
}
