<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;
    protected $table = 'user_basic_info';
    protected $keyType = 'integer';
    protected $fillable = ['first_name', 'last_name', 'email', 'address', 'gender', 'date_of_birth', 'profile_pic', 'phone_no', 'note','cover_pic','nationality', 'created_at', 'updated_at', 'user_id'];
}