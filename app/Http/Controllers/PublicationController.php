<?php

namespace App\Http\Controllers;

use App\Publication;
use App\Http\Resources\PublicationResource;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PublicationResource::collection(Publication::with('scores')->paginate(25));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $publication = Publication::create([
                'user_id'     => $request->user()->id,
                'title'       => $request->title,
                'description' => $request->description,
              ]);

      return new PublicationResource($publication);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        return new PublicationResource($publication);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        // check if currently authenticated user is the owner of the publication
        if ($request->user()->id !== $publication->user_id) {
          return response()->json(['error' => 'You can only edit your own publications.'], 403);
        }

        $publication->update($request->only(['title', 'description']));

        return new PublicationResource($publication);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();

        return response()->json(null, 204);
    }
}
