<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
  protected $fillable = ['user_id', 'publication_id', 'score'];

  /**
   * Relationship between publications and scores
   *
   * @return \Illuminate\Http\Response
   */
   public function publication()
   {
     return $this->belongsTo(Publication::class);
   }
}
