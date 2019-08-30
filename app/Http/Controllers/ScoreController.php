<?php

namespace App\Http\Controllers;

use App\Publication;
use App\Score;
use App\Http\Resources\ScoreResource;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function store(Request $request, Publication $publication)
    {
      $score = Score::firstOrCreate(
        [
          'user_id' => $request->user()->id,
          'publication_id' => $publication->id,
        ],
        ['score' => $request->score]
      );

      return new ScoreResource($score);
    }
}
