<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentContactUs extends Model
{
    use HasFactory;
    protected $table = 'contact_us_agent';
    protected $keyType = 'integer';
    protected $fillable = ['agent_id', 'agent_name', 'agent_phone','date','time', 'message', 'created_at', 'updated_at'];
}