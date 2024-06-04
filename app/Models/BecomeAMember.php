<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BecomeAMember extends Model
{
    use HasFactory;
    protected $table = 'become_a_member';
    protected $keyType = 'integer';
    /*protected $attributes = [
        'general ' => '[]'
     ];*/
    protected $fillable = ['application_id','name','email','mobile_no','city','applied_for','status', 'created_at', 'updated_at'];
}