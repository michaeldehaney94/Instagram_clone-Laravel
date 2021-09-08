<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = []; //disable fillables to make it unnecessary to need them

    //creates a relationship with 'User Model' to reference user data
    //using user_id (foreign key) in profile table in database
    public function user() {

        return $this->belongsTo(User::class); 
    }
}
