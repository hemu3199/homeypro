<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;
    protected $table = 'houseplan';
    protected $keyType = 'integer';
    /*protected $attributes = [
        'general ' => '[]'
     ];*/
    protected $fillable = ['property_id','plan_title','plan_optional_info','plan_details','plan_image','created_at','updated_at'];
}
