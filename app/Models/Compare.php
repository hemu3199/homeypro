<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compare extends Model
{
    use HasFactory;
     protected $table = 'compare';
    protected $keyType = 'integer';
    protected $fillable = ['user_id','property_id','update_at'];
}
