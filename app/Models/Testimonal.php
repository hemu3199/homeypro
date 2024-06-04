<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonal extends Model
{
    use HasFactory;
    protected $table = 'testimonials';
    protected $keyType = 'integer';
    protected $fillable = ['user_id', 'user_name', 'user_email', 'message', 'rating', 'status', 'deleted_status', 'updated_at', 'created_at'];
}