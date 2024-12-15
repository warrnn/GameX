<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Categories;
use App\Models\Games;
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
        return view('guest.contents.index', compact('page_title'));
    }

    public function store()
    {
        $page_title = 'GameX | Store';
        return view('buyer.contents.store.store', compact('page_title'));
    }

    public function detail()
    {
        $page_title = 'GameX | Detail';
        return view('buyer.contents.store.detail', compact('page_title'));
    }

    public function payment()
    {
        $page_title = 'GameX | Payment';
        return view('buyer.contents.store.payment', compact('page_title'));
    }

    public function offers()
    {
        $page_title = 'GameX | Offers';
        return view('buyer.contents.store.offers', compact('page_title'));
    }

    public function category(Request $request)
    {
        $page_title = 'GameX | ' . strtoupper($request->name);
        $category_name = $request->name;
        return view('buyer.contents.store.category', compact('page_title', 'category_name'));
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

        if ($request->session()->has('seller_id')) {
            return view('buyer.contents.profile.profile', compact('page_title', 'current_user'));
        }

        $response = Http::withoutVerifying()->get('https://alamat.thecloudalert.com/api/kabkota/get');
        if ($response->successful()) {
            $kabKota = $response->json()['result'];
            return view('buyer.contents.profile.profile', compact('page_title', 'current_user', 'kabKota'));
        }

        return view('buyer.contents.store.store', compact('page_title'))->with('error', 'An Error Occurred, Please Try Again');
    }

    public function sellGames(Request $request)
    {
        $page_title = 'GameX | Sell Games';
        $selled_games = $this->getSelledGames($request);
        return view('seller.contents.store.sell_games', compact('page_title', 'selled_games'));
    }

    public function manageGame()
    {
        $page_title = 'GameX | Manage Game';
        $categories = Categories::all();
        return view('seller.contents.store.manage_game', compact('page_title', 'categories'));
    }

    public function managePromotion()
    {
        $page_title = 'GameX | Manage Promotion';
        return view('seller.contents.store.manage_promotions', compact('page_title'));
    }

    public function transactionProcesses()
    {
        $page_title = 'GameX | Transaction Processes';
        return view('seller.contents.store.transaction_processes', compact('page_title'));
    }

    public function sellerProfile()
    {
        $page_title = 'GameX | Seller Profile';
        return view('seller.contents.profile.profile', compact('page_title'));
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
        $sellers = Sellers::select('*')
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
        $admins = Admins::all();
        return view('admin.contents.admins.admins', compact('page_title', 'admins'));
    }

    // Non-route Function
    public function getSelledGames(Request $request)
    {
        $seller_id = $request->session()->get('seller_id');

        $gamesSelled = Games::select('games.*', 'categories.name')
            ->join('categories', 'categories.id', '=', 'games.category_id')
            ->join('sell_details', 'sell_details.game_id', '=', 'games.id')
            ->where('sell_details.seller_id', $seller_id)
            ->get();

        return $gamesSelled;
    }
}
