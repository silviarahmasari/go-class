<?php

namespace App\Models;

<<<<<<< HEAD
=======
// use Illuminate\Foundation\Auth\User as Authenticatable;
>>>>>>> 2f6d77e9c994f75a606bd53e29e1d3f939ff399f
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
<<<<<<< HEAD
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id_user';
=======
    // use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id_user';

    public function class()
    {
        return $this->hasMany(Classes::class);
    }
>>>>>>> 2f6d77e9c994f75a606bd53e29e1d3f939ff399f
}
