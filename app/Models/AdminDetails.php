<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminDetails extends Model
{
    use HasFactory;
    protected $table = 'admin_basic_information';
    protected $keyType = 'integer';

    protected $fillable = ['admin_id','user_name','first_name','last_name',
                           'email','company_phoneno','phoneno','gender','date_of_birth',
                           'description','country','state','profile_image','background_image',
                           'created_at','updated_at'];
} 