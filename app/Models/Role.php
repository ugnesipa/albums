<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// connecting to roles as a many to many relationship
class Role extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany('App\Models\User','user_role');
    }
}
