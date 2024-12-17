<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;
use db;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    public function searchOwnedGames(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->input('query');
            $user_id = $request->session()->get('user_id');

            $owned_games = Games::select('*')
                ->join('game_owneds', 'game_owneds.game_id', '=', 'games.id')
                ->where('game_owneds.user_id', $user_id)
                ->where('games.name', 'like', '%' . $search . '%')
                ->get();

            return view('buyer.partials.owned_games_card', compact('owned_games'))->render();
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }
}
