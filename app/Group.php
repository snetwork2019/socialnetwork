<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $fillable = ['name','owner_id'];
    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
}
