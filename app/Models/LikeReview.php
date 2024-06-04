<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeReview extends Model
{
    use HasFactory;
    protected $table = 'review_like';
    protected $keyType = 'integer';
    protected $fillable = ['review_id', 'property_id', 'user_id', 'date', 'updated_at', 'created_at'];
}