<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property_images extends Model
{
    use HasFactory;
    protected $table = 'property_images';
    protected $keyType = 'integer';
    /*protected $attributes = [
        'general ' => '[]'
     ];*/
    protected $fillable = ['property_id','image_name','created_at','updated_at','added_by'];
}
