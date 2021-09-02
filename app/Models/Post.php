<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //create relationship between user model and the post model 
    //to link a user to their multiple posts
    public function user() {
        return $this->belongsTo(User::class);
    }

    protected $guarded = []; 
    //this tells laravel to not guard against data passing through 
    //properties being validated

}
