<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $keyType = 'integer';
    /*protected $attributes = [
        'general ' => '[]'
     ];*/
    protected $fillable = ['project_id','project_name', 'project_location', 'project_description', 'project_type', 'project_status', 'project_payment_type','avg_price', 'portion_sizes', 'project_area', 'configurations', 'launch_date', 'project_address', 'general_amenities', 'project_image', 'project_broucher', 'created_at', 'updated_at', 'agent_id'];
}