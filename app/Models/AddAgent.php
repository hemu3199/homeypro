<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddAgent extends Model
{
    use HasFactory;
    protected $table = 'agent_basic_information';
    protected $keyType = 'integer';
    /*protected $attributes = [
        'general ' => '[]'
     ];*/
    protected $fillable = ['agent_id','country_id','state','background_image',
                'fname','lname','dateofbirth','gender','speciality','mobile','a_email','url','file','description','agentlocation','agentaddress','agentlocpincode','username','phoneno','password','cpassword','facebook','twitter','google','linkedin'];
}   