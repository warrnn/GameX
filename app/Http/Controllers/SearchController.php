<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;
use db;


class SearchController extends Controller
{
    public function index()
    {
        return view('search');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $user_id = $request->session()->get('user_id');
        $join = DB::table('games')
            ->join('user_games', 'games.id', '=', 'user_games.game_id')
            ->where('user_games.user_id', $user_id)
            ->where('games.name', 'like', "%" . $search . "%")
            ->select('games.*')
            ->get();
        $games = Games::where('name', 'like', "%" . $search . "%")->get();

        return response()->json($games);
    }
}
