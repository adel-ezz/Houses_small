<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class House extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['name','describe','default_price','created_by'];

    /**
     * relation many to many
     * Seasons
     * @return object
     */
    function seasons():object
    {
        return $this->belongsToMany(Season::class,'house_seasons','house_id','season_id')->withPivot('price');
    }

    /**
     * relation many to many
     * Seasons
     * @return object
     */
    function properties():object
    {
        return $this->belongsToMany(Proberty::class,'houses_properties','house_id','property_id');
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


