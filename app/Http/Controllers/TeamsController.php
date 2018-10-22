<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();

        return response()->json($teams, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $team = Team::create(['name' => $request->name]);

        return response()->json($team);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $team = Team::find($id);

        if ($team){
            $players = Team::find($id)->players;

            return response()->json(['team' => $team, 'players' => $players]);
        }

        return response()->json(['error' => true, 'message' => 'The ID doesn´t exist'], 404);

    }


}
