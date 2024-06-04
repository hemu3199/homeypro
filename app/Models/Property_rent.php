<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property_rent extends Model
{
    use HasFactory;
    protected $table = 'properties';
    protected $keyType = 'integer';
    /*protected $attributes = [
        'general ' => '[]'
     ];*/
    protected $fillable = ['name','property_id','country_id','state', 'location', 'description', 'property_type', 'property_status','payment_type' ,'price', 'bedsqft', 'sqft', 'carparking', 'year', 'property_address', 'appartment_type','diningroom', 'total_sqft', 'kitchen', 'livingroom', 'masterbedroom', 'bedroom2', 'other_room', 'general', 'file','policy', 'agent_id','user_id','status','approval','approvedby','created_at','updated_at'];
}