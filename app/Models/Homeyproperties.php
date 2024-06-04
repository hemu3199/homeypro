<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homeyproperties extends Model
{
    use HasFactory;
     protected $table = 'homeyproperties';
    protected $keyType = 'integer';
    /*protected $attributes = [
        'general ' => '[]'
     ];*/
    protected $fillable = ['property_id','name', 'type', 'price', 'categories', 'key_words', 'address', 'longitude','latitude','city','email_address','phone_no','website','image','area','accomodation','yard_size','bedrooms','bathrooms','carage','deatils_text','amenities','room_title','r_image','h_plan_title','h_plan_info','h_plan_details','p_image','properties_documents','googlemap','mortgage_cal','contact_form','user_id','agent_id','added_by','approval_status','origin','status','created_at','updated_at','remember_token','approved_by','wifi','pool','security','laundry_room','equipped_kitchen','ac','featured','video_link','property_deleted'];
}
