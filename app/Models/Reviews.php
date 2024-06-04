<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $keyType = 'integer';
    protected $fillable = ['property_id', 'user_id', 'user_name', 'user_email', 'message', 'rating', 'status', 'date', 'deleted_status', 'updated_at', 'created_at'];
}