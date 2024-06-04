<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentReport extends Model
{
    use HasFactory;
    protected $table = 'agent_reports';
    protected $keyType = 'integer';
    /*protected $attributes = [
        'general ' => '[]'
     ];*/
    protected $fillable = ['property_id','member_id','user_id','name','email','report_message','created_at','updated_at'];
}