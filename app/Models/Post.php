<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Relationship 1:N to table Posts (User model - hasMany(Post::class) )
    public function user(){
        return $this->belongsTo(User::class);

        // Permite la consulta de los datos del usuario asociado al post.
        // $user = Post::find(3)->user;
    }
}
