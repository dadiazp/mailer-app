<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name' 
    ];

    public function country() {
        return $this->belongsTo(Country::class);
    } 

    public function cities() {
        return $this->hasMany(City::class);
    } 
}
