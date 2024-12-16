<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Categories;
use App\Models\Detail_joins;
use App\Models\Game_owneds;
use App\Models\Games;
use App\Models\Sales;
use App\Models\Sell_details;
use App\Models\Sellers;
use App\Models\Transactions;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RoutesController extends Controller
{
    public function index()
    {
        $page_title = 'GameX';
        $games = Games::all();
        $sales_game = Games::select('*', 'games.id')
            ->join('sales', 'sales.game_id', '=', 'games.id')
            ->get();

        return view('guest.contents.index', compact('page_title', 'games', 'sales_game'));
    }

    public function store()
    {
        $page_title = 'GameX | Store';
        $games = Games::all();
        $sales_game = Games::select('*', 'games.id')
            ->join('sales', 'sales.game_id', '=', 'games.id')
            ->get();

        return view('buyer.contents.store.store', compact('page_title', 'games', 'sales_game'));
    }

    public function detail(Request $request)
    {
        $page_title = 'GameX | Detail';
        $game = Games::select('*', 'games.id',  'games.name', 'categories.name as category_name', 'users.name as seller_name')
            ->join('categories', 'categories.id', '=', 'games.category_id')
            ->join('sell_details', 'sell_details.game_id', '=', 'games.id')
            ->join('sellers', 'sellers.id', '=', 'sell_details.seller_id')
            ->join('users', 'users.id', '=', 'sellers.user_id')
            ->where('games.id', $request->game_id)
            ->first();

        return view('buyer.contents.store.detail', compact('page_title', 'game'));
    }

    public function payment()
    {
        $page_title = 'GameX | Payment';

        return view('buyer.contents.store.payment', compact('page_title'));
    }

    public function offers()
    {
        $page_title = 'GameX | Offers';
        $sales_game = Games::select('*', 'games.id')
            ->join('sales', 'sales.game_id', '=', 'games.id')
            ->get();

        return view('buyer.contents.store.offers', compact('page_title', 'sales_game'));
    }

    public function category(Request $request)
    {
        $category_name = $request->category_name;
        $page_title = 'GameX | ' . strtoupper($category_name);
        $games = Games::select('*', 'games.id', 'games.name')
            ->join('categories', 'categories.id', '=', 'games.category_id')
            ->where('categories.name', $category_name)
            ->get();

        return view('buyer.contents.store.category', compact('page_title', 'category_name', 'games'));
    }

    public function community()
    {
        $page_title = 'GameX | Community';

        return view('buyer.contents.community.community', compact('page_title'));
    }

    public function theComunities()
    {
        $page_title = 'GameX | The Communities';

        return view('buyer.contents.community.the_communities', compact('page_title'));
    }

    public function myComunities()
    {
        $page_title = 'GameX | My Communities';

        return view('buyer.contents.community.my_communities', compact('page_title'));
    }

    public function detailCommunity()
    {
        $page_title = 'GameX | Detail Community';

        return view('buyer.contents.community.detail', compact('page_title'));
    }

    public function games()
    {
        $page_title = 'GameX | My Games';

        return view('buyer.contents.games.games', compact('page_title'));
    }

    public function play()
    {
        $page_title = 'GameX | Play';

        return view('buyer.contents.games.play', compact('page_title'));
    }

    public function profile(Request $request)
    {
        $page_title = 'GameX | Profile';
        $current_user = Users::where('id', $request->session()->get('user_id'))->first();
        $games_count = Game_owneds::where('user_id', $request->session()->get('user_id'))->count();
        $communities_count = Detail_joins::where('user_id', $request->session()->get('user_id'))->count();
        $isSeller = Sellers::where('user_id', $request->session()->get('user_id'))->exists();

        if (Sellers::where('user_id', $request->session()->get('user_id'))->exists()) {
            return view('buyer.contents.profile.profile', compact('page_title', 'current_user', 'games_count', 'communities_count', 'isSeller'));
        }

        $kabKota = $this->getKabKotaAPI();

        return view('buyer.contents.profile.profile', compact('page_title', 'current_user', 'kabKota', 'games_count', 'communities_count', 'isSeller'));
    }

    public function sellGames(Request $request)
    {
        $page_title = 'GameX | Sell Games';
        $selled_games = $this->getSelledGames($request);
        $seller_id = $this->getUserSellerId($request);

        return view('seller.contents.store.sell_games', compact('page_title', 'selled_games', 'seller_id'));
    }

    public function manageGame(Request $request)
    {
        $page_title = 'GameX | Manage Game';
        $categories = Categories::all();

        if ($request->route('game_id')) {
            $game = Games::where('id', $request->route('game_id'))->first();

            return view('seller.contents.store.manage_game', compact('page_title', 'categories', 'game'));
        }

        return view('seller.contents.store.manage_game', compact('page_title', 'categories'));
    }

    public function managePromotion(Request $request)
    {
        $page_title = 'GameX | Manage Promotion';
        $game_sales = Sales::select('*', 'sales.id')
            ->join('games', 'games.id', '=', 'sales.game_id')
            ->join('sell_details', 'sell_details.game_id', '=', 'games.id')
            ->where('sell_details.seller_id', $this->getUserSellerId($request))
            ->get();
        $selled_games = $this->getSelledGames($request);

        return view('seller.contents.store.manage_promotions', compact('page_title', 'game_sales', 'selled_games'));
    }

    public function transactionProcesses()
    {
        $page_title = 'GameX | Transaction Processes';

        return view('seller.contents.store.transaction_processes', compact('page_title'));
    }

    public function sellerProfile(Request $request)
    {
        $page_title = 'GameX | Seller Profile';
        $current_seller = Sellers::select('*', 'sellers.id')
            ->join('users', 'users.id', '=', 'sellers.user_id')
            ->where('user_id', $request->session()->get('user_id'))->first();
        $products_count = Sell_details::where('seller_id',  $this->getUserSellerId($request))->count();
        $transactions_count = Transactions::where('seller_id',  $this->getUserSellerId($request))->count();

        $kabKota = $this->getKabKotaAPI();

        return view('seller.contents.profile.profile', compact('page_title', 'current_seller', 'products_count', 'transactions_count', 'kabKota'));
    }

    public function usersList()
    {
        $page_title = 'GameX | Users List';
        $users = Users::all();

        return view('admin.contents.users.users_list', compact('page_title', 'users'));
    }

    public function sellerVerification()
    {
        $page_title = 'GameX | Seller Verification';
        $sellers = Sellers::select('*', 'sellers.id')
            ->join('users', 'users.id', '=', 'sellers.user_id')
            ->get();

        return view('admin.contents.users.seller_verification', compact('page_title', 'sellers'));
    }

    public function transactions()
    {
        $page_title = 'GameX | Transactions';
        $transactions = Transactions::all();

        return view('admin.contents.transactions.transactions', compact('page_title', 'transactions'));
    }

    public function categories()
    {
        $page_title = 'GameX | Categories';
        $categories = Categories::all();

        return view('admin.contents.categories.categories', compact('page_title', 'categories'));
    }

    public function admins()
    {
        $page_title = 'GameX | Admins';
        $admins = Admins::select('*', 'admins.id')
            ->join('users', 'users.id', '=', 'admins.user_id')
            ->get();
        $users = Users::all();

        return view('admin.contents.admins.admins', compact('page_title', 'admins', 'users'));
    }

    // Non-route Function
    public function getSelledGames(Request $request)
    {
        $gamesSelled = Games::select('games.*', 'categories.name as category_name')
            ->join('categories', 'categories.id', '=', 'games.category_id')
            ->join('sell_details', 'sell_details.game_id', '=', 'games.id')
            ->where('sell_details.seller_id',  $this->getUserSellerId($request))
            ->get();

        return $gamesSelled;
    }

    public function getKabKotaAPI()
    {
        $response = Http::withoutVerifying()->get('https://alamat.thecloudalert.com/api/kabkota/get');

        if ($response->successful()) {
            $cities = $response->json()['result'];
            return $cities;
        }

        return redirect()->back()->with('error', 'An Error Occurred, Please Try Again');
    }

    public function getUserSellerId(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $seller_id = Sellers::where('user_id', $user_id)->first();

        return $seller_id->id;
    }
}
