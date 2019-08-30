<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
  /**
   * Relationship between users and publications
   *
   * @return \Illuminate\Http\Response
   */
   public function user()
   {
     return $this->belongsTo(User::class);
   }
}
