<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    use HasFactory;
    protected $table = 'contact_us';
    protected $keyType = 'integer';
    protected $fillable = ['user_id', 'name', 'email', 'phone','date','time', 'message', 'created_at', 'updated_at'];
}