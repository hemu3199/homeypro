<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property_sale extends Model
{
    use HasFactory;
    protected $table = 'properties';
    protected $keyType = 'integer';
    protected $fillable = ['name', 'location', 'description', 'property_type', 'property_status', 'price', 'bedsqft', 'sqft', 'carparking', 'year', 'property_address', 'appartment_type', 'total_sqft', 'kitchen', 'livingroom', 'masterbedroom', 'bedroom2', 'other_room', 'general', 'file', 'agent_id','created_at'];
}