<?php

namespace App\Http\Controllers;

use App\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;


class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = $request->user()->id;
        $invitation = Invitation::where("user_id", $userId)->get();
        return response($invitation->toArray(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'group_id' => 'required',
            'user_id'  => 'required',
        ]);
        if ( $validator->fails() ) {
            return response("Error de validacion", 400);
        }
        $invitation = Invitation::create($input);
        return response("Guardado exitosamente", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function show(Invitation $invitation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function edit(Invitation $invitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invitation $invitation)
    {

      $input = $request->all();
        if($input['status'] == 1){
          $invitation->status = 1;
          $invitation->save($input);
          $validateStatus = response()->json("Invitación aceptada", 200);
        }else{
          $invitation->status = 2;
          $invitation->save($input);
          $validateStatus = response()->json("Invitacion rechazada", 200);
        }
        return $validateStatus;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invitation $invitation)
    {
        //
    }
}
