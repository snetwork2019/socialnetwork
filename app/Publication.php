<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
  protected $fillable = ['user_id', 'title', 'description'];

  /**
   * Relationship between users and publications
   *
   * @return \Illuminate\Http\Response
   */
   public function user()
   {
     return $this->belongsTo(User::class);
   }

   /**
    * Relationship between publications and scores
    *
    * @return \Illuminate\Http\Response
    */
    public function score()
    {
      return $this->hasMany(Score::class);
    }
}
