<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'postal_code', 'state_id' 
    ];

    public function state() {
        return $this->belongsTo(State::class);
    } 

    public function users() {
        return $this->hasMany(User::class);
    }
}
