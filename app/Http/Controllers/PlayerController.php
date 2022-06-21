<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\PlayerTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();
        return $players;
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
        $validate = $request->validate([
            'nama' => 'required',
        ]);

        if ($validate) {
            $player = new Player();

            $player->name = $request->nama;
            $player->player_team_id = rand(1, PlayerTeam::count());
            $player->save();
            return redirect()->back()->with('success', 'Player berhasil ditambahkan');
        } else {
            return redirect()->back()->withErrors($validate);
        }
    }

    public function random()
    {
        $players = Player::all();
        foreach ($players as $player) {
            $player->player_team_id = rand(1, PlayerTeam::count());
            $player->save();
        }
        return redirect()->back()->with('success', 'Player berhasil diacak');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('players')->where('id', $request->id)->delete();
        return redirect()->back()->with('success', 'Player berhasil dihapus');
    }
}
