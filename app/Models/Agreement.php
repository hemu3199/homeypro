<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
	protected $table = 'agreement';
    protected $keyType = 'integer';
    protected $fillable = ['member_id', 'property_id', 'file', 'added_by', 'created_at', 'updated_at'];


}