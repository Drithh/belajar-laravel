<?php

namespace App\Http\Controllers;

use App\Models\PlayerTeam;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playerTeams = PlayerTeam::all();
        return $playerTeams;
        //
    }

    public function getPlayerTeams()
    {

        $playerTeam = PlayerTeam::all();

        // combine player to make same team
        $playerTeams = [];
        foreach ($playerTeam as $team) {
            $playerTeams[$team->id] = [
                'team_name' => $team->team_name,
                'players' => []
            ];
        }

        $player = Player::all();

        foreach ($player as $player) {
            $playerTeams[$player->player_team_id]['players'][] = $player->name;
        }

        return $playerTeams;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlayerTeam  $playerTeam
     * @return \Illuminate\Http\Response
     */
    public function show(PlayerTeam $playerTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlayerTeam  $playerTeam
     * @return \Illuminate\Http\Response
     */
    public function edit(PlayerTeam $playerTeam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlayerTeam  $playerTeam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlayerTeam $playerTeam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlayerTeam  $playerTeam
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlayerTeam $playerTeam)
    {
        //
    }
}
