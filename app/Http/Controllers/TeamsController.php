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

         //json_encode(['status' => 200, 'results' => $teams]);

        return response()->json($teams, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->name){
            $name = $request->name;

           $team = Team::create(['name' => $name]);

           return $team;
        }

        return response()->json(['error'=> true, 'msg' => 'Name is mandatory'], 500);
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
