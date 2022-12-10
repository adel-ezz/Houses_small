<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Season extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name', 'describe', 'start', 'end', 'created_by'];

    /**
     * relation many to many
     * Seasons
     *
     * @return object
     */
    function houses(): object
    {
        return $this->belongsToMany(Season::class, 'house_seasons', 'season_id','house_id');
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
