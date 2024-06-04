<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $property_id
 * @property string $created_at
 * @property string $updated_at
 * @property Property_rent $propertyrent
 * @property User $user
 */
class InterstedProperty extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'interested_property';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'property_id', 'agent_id', 'status', 'property_type', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function propertyrent()
    {
        return $this->belongsTo('App\Models\Property_rent', null, 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', null, 'id');
    }
}