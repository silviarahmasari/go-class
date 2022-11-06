<?php

namespace App\Models;

// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    // use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id_user';

    public function class()
    {
        return $this->hasMany(Classes::class);
    }
}
