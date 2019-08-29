<?php

namespace App\Http\Controllers\Api;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=  Group::all();
        return response()->json($data, 200);
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
        $input    = $request->all();
        $validate = Validator::make($input, [
            'name'     => 'required|string|max:255',
            'owner_id' => 'required|max:255'
        ]);
        if( $validate->fails() ){
            return response()->json("Error", 401);
        }
        Group::create($input);
        return response()->json("Grupo creado exitosamente", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $data = Group::find($group);
        return response()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $input    = $request->all();
        $validate = Validator::make($input, [
            'name'     => 'required|string|max:255',
            'owner_id' => 'required|max:255'
        ]);

        if( $validate->fails() ){
            return response()->json("Error", 401);
        }
        Group::where("id", $group->id)->update([
            "name"     => $input["name"],
            "owner_id" => $input["owner_id"]
        ]);
        return response()->json("Grupo editado exitosamente", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
