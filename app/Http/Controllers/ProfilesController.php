<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Model\Profile;
use App\Model\Post;

class ProfilesController extends Controller
{
    public function index($user)
    {
        $user = User::findOrFail($user); //find specific user account

        return view('profiles.index', [
            'user' => $user,
        ]);
    }
}
