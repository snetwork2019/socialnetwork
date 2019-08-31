<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = [
        'group_id',
        'user_id'
    ];

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
     public function user()
     {
       return $this->belongsTo(User::class);
     }
}
