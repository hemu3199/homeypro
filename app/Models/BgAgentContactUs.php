<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BgAgentContactUs extends Model
{
    use HasFactory;
    protected $table = 'contact_us_bgagent';
    protected $keyType = 'integer';
    protected $fillable = ['bg_agent_id', 'bg_agent_name', 'bg_agent_phone','date','time', 'message', 'created_at', 'updated_at'];
}