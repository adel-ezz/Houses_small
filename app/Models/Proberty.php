<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proberty extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['title','describe','type','value','created_by'];
    protected $table='properties';

    /**
     * relation many to many
     * Seasons
     * @return object
     */
    function houses():object
    {
        return $this->belongsToMany(Season::class,'house_properties','property_id','house_id');
    }

    /**
     * relation belongs to
     * Seasons
     * @return object
     */

    function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
