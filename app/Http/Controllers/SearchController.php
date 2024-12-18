<?php

namespace App\Http\Controllers;

use App\Models\Communities;
use App\Models\Games;
use Illuminate\Http\Request;
use db;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    public function searchOffers(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->input('query');

            $sales_game = Games::select('*', 'games.id')
                ->join('sales', 'sales.game_id', '=', 'games.id')
                ->where('games.name', 'like', '%' . $search . '%')
                ->get();

            return view('buyer.partials.sales_game_card', compact('sales_game'))->render();
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }

    public function searchCommunities(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->input('query');
            $communities = Communities::withCount('detail_joins as member_count')
                ->where('name', 'like', '%' . $search . '%')
                ->get();
            return view('buyer.partials.community_card', compact('communities'))->render();
        }
        return response()->json(['error' => 'Invalid request'], 400);
    }

    public function filterGames(Request $request)
    {
        if ($request->ajax()) {
            $category = $request->input('category');

            if ($category == 'all') {
                $owned_games = Games::select('*')
                    ->join('game_owneds', 'game_owneds.game_id', '=', 'games.id')
                    ->where('game_owneds.user_id', $request->session()->get('user_id'))
                    ->get();
            } else {
                $owned_games = Games::select('*')
                    ->join('game_owneds', 'game_owneds.game_id', '=', 'games.id')
                    ->where('game_owneds.user_id', $request->session()->get('user_id'))
                    ->where('games.category_id', $category)
                    ->get();
            }

            return view('buyer.partials.owned_games_card', compact('owned_games'))->render();
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }

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
