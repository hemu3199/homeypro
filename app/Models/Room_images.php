<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_images extends Model
{
    use HasFactory;
    protected $table = 'room_images';
    protected $keyType = 'integer';
    /*protected $attributes = [
        'general ' => '[]'
     ];*/
    protected $fillable = ['room_id','property_id','image_name','created_at','updated_at'];
}
