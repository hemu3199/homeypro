<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $table = 'application';
    protected $keyType = 'integer';
    /*protected $attributes = [
        'general ' => '[]'
     ];*/
    protected $fillable = ['user_id','property_id', 'aadhar_card', 'present_address', 'application_status', 'employee_status', 'pan_no','transfered_to', 'agent_id','approval_status','remarks','created_at','updated_at'];
}