<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\User;
use App\Models\Profile;
use App\Models\Post;

class PostsController extends Controller
{
    //this middleware will require all routes to require authorization
    //users has to be logged in.
    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        return view('posts.create');
    }

    public function store() {
        $data = request()->validate([
            'caption'=> 'required',
            'image'=> ['required', 'image'], //validation rule to add only image
        ]);

        //create path to store uploaded image
        //the 1st argument is the folder name
        //the 2nd arguments is the driver for where the file will be stored locally
        //when an image is uploaded it will be placed in "storage>app>public>uploads"
        $imagePath = request('image')->store('uploads', 'public');

        //Intervention Image library use to resize image upon post
        //locates the image location when resizing
        //fit(W, H)
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        
        //pass input data to image and caption field in database,
        //while authenticating the user who is passing the data 
        //to the database and posting the image
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
        
    }

    public function show(\App\Models\Post $post) {
        return view('posts.show', compact('post'));
    }
}
