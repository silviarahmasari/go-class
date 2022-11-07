<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    // use HasFactory;
    protected $table = 'class';
    protected $primaryKey = 'id_class';
    
    public function users()
    {
        return $this->belongsTo(Users::class, 'user_id', 'id_user');
    }
}
