<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentReview extends Model
{
    use HasFactory;
    protected $table = 'agent_reviews';
    protected $keyType = 'integer';
    /*protected $attributes = [
        'general ' => '[]'
     ];*/
    protected $fillable = ['property_id','member_id','user_id','rating','name','email','review','created_at','updated_at'];
}