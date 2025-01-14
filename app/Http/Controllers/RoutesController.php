<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Categories;
use App\Models\Communities;
use App\Models\Detail_joins;
use App\Models\Game_owneds;
use App\Models\Games;
use App\Models\Posts;
use App\Models\Sales;
use App\Models\Sell_details;
use App\Models\Sellers;
use App\Models\Transactions;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Midtrans\Transaction;

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
        $game = Games::select('*', 'games.id',  'games.name', 'categories.name as category_name', 'users.name as seller_name', 'user_id as seller_user_id', 'sales.discount')
            ->join('categories', 'categories.id', '=', 'games.category_id')
            ->join('sell_details', 'sell_details.game_id', '=', 'games.id')
            ->join('sellers', 'sellers.id', '=', 'sell_details.seller_id')
            ->join('users', 'users.id', '=', 'sellers.user_id')
            ->leftjoin('sales', 'sales.game_id', '=', 'games.id')
            ->where('games.id', $request->game_id)
            ->first();

        // dd($game);

        $userOwnTheGame = Game_owneds::where('user_id', $request->session()->get('user_id'))->where('game_id', $request->game_id)->exists();


        return view('buyer.contents.store.detail', compact('page_title', 'game', 'userOwnTheGame'));
    }

    public function payment(Request $request)
    {
        $page_title = 'GameX | Payment';
        $game = Games::select('*', 'games.id',  'games.name', 'categories.name as category_name', 'users.name as seller_name', 'user_id as seller_user_id', 'sales.discount')
            ->join('categories', 'categories.id', '=', 'games.category_id')
            ->join('sell_details', 'sell_details.game_id', '=', 'games.id')
            ->join('sellers', 'sellers.id', '=', 'sell_details.seller_id')
            ->join('users', 'users.id', '=', 'sellers.user_id')
            ->leftjoin('sales', 'sales.game_id', '=', 'games.id')
            ->where('games.id', $request->game_id)
            ->first();
        return view('buyer.contents.store.payment', compact('page_title', 'game'));
    }

    public function paymentProcess()
    {
        $page_title = 'GameX | Payment';
        return view('buyer.contents.store.midtrans', compact('page_title'));
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
            ->leftjoin('sales', 'sales.game_id', '=', 'games.id')
            ->where('categories.name', $category_name)
            ->get();

        // dd($games);

        return view('buyer.contents.store.category', compact('page_title', 'category_name', 'games'));
    }

    public function community(Request $request)
    {
        $page_title = 'GameX | Community';
        $communities = Communities::withCount('detail_joins as member_count')->get();
        $joined_communities = Communities::select('*', 'communities.id')
            ->join('detail_joins', 'detail_joins.community_id', '=', 'communities.id')
            ->where('detail_joins.user_id', $request->session()->get('user_id'))
            ->withCount('detail_joins as member_count')
            ->get();
        $posts = Posts::select("*", "users.name as user_name", "communities.name as community_name")
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->join('communities', 'communities.id', '=', 'posts.community_id')
            ->get();

        return view('buyer.contents.community.community', compact('page_title', 'communities', 'joined_communities', 'posts'));
    }

    public function theComunities()
    {
        $page_title = 'GameX | The Communities';
        $communities = Communities::withCount('detail_joins as member_count')->get();

        return view('buyer.contents.community.the_communities', compact('page_title', 'communities'));
    }

    public function myComunities(Request $request)
    {
        $page_title = 'GameX | My Communities';
        $joined_communities = Communities::select('*', 'communities.id')
            ->join('detail_joins', 'detail_joins.community_id', '=', 'communities.id')
            ->where('detail_joins.user_id', $request->session()->get('user_id'))
            ->withCount('detail_joins as member_count')
            ->get();

        return view('buyer.contents.community.my_communities', compact('page_title', 'joined_communities'));
    }

    public function detailCommunity(Request $request)
    {
        $page_title = 'GameX | Detail Community';

        $community_id = $request->community_id;
        $community = Communities::where('id', $community_id)->withCount('detail_joins as member_count')->first();
        $isJoined = Detail_joins::where('user_id', $request->session()->get('user_id'))->where('community_id', $community_id)->exists();
        $socials = Users::select('*')
            ->join('detail_joins', 'detail_joins.user_id', '=', 'users.id')
            ->where('detail_joins.community_id', $community_id)
            ->get();
        $posts = Posts::select("*")
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->where('posts.community_id', $community_id)
            ->get();

        return view('buyer.contents.community.detail', compact('page_title', 'community', 'isJoined', 'socials', 'posts'));
    }

    public function games(Request $request)
    {
        $page_title = 'GameX | My Games';
        $games_owned = Games::select('*', 'game_id')
            ->join('game_owneds', 'game_owneds.game_id', '=', 'games.id')
            ->where('game_owneds.user_id', $request->session()->get('user_id'))
            ->get();
        $categories_owned = Categories::select('*', 'categories.id', 'categories.name as category_name')
            ->join('games', 'games.category_id', '=', 'categories.id')
            ->join('game_owneds', 'game_owneds.game_id', '=', 'games.id')
            ->where('game_owneds.user_id', $request->session()->get('user_id'))
            ->get();

        // dd($categories);

        return view('buyer.contents.games.games', compact('page_title', 'games_owned', 'categories_owned'));
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
        $user_id = $request->session()->get('user_id');

        $digital_games = Games::select('*', 'games.id', 'games.name', 'game_owneds.created_at as owned_date')
            ->join('game_owneds', 'game_owneds.game_id', '=', 'games.id')
            ->where('game_owneds.user_id', $user_id)
            ->where('games.base', 'DIGITAL')
            ->get();
        // dd($digital_games);
        $physical_games = Games::select('*', 'games.id', 'games.name', 'game_owneds.created_at as owned_date', 'users.name as seller_name', 'transactions.status')
            ->join('game_owneds', 'game_owneds.game_id', '=', 'games.id')
            ->join('transactions', 'transactions.game_id', '=', 'games.id')
            ->join('sellers', 'sellers.id', '=', 'transactions.seller_id')
            ->join('users', 'users.id', '=', 'sellers.user_id')
            ->where('game_owneds.user_id', $user_id)
            ->where('games.base', 'PHYSICAL')
            ->get();
        $buyer_for_transactions = Transactions::select('*', 'transactions.id', 'users.name as buyer_name', 'transactions.status')
            ->join('buyers', 'buyers.id', '=', 'transactions.buyer_id')
            ->join('users', 'users.id', '=', 'buyers.user_id')
            ->join('games', 'games.id', '=', 'transactions.game_id')
            ->where('games.base', 'PHYSICAL')
            ->where('users.id', $user_id)
            ->get();
        // dd($physical_games);
        $communities = Communities::select('*', 'detail_joins.created_at as join_date')
            ->join('detail_joins', 'detail_joins.community_id', '=', 'communities.id')
            ->where('detail_joins.user_id', $user_id)
            ->get();

        // dd($communities);

        // $transaction_date = Transactions:: ;

        $games_count = $digital_games->count() + $physical_games->count();
        $communities_count = $communities->count();
        $isSeller = Sellers::where('user_id', $request->session()->get('user_id'))->exists();

        if (Sellers::where('user_id', $request->session()->get('user_id'))->exists()) {
            return view('buyer.contents.profile.profile', compact('page_title', 'current_user', 'digital_games', 'physical_games', 'buyer_for_transactions', 'communities', 'games_count', 'communities_count', 'isSeller'));
        }

        $kabKota = $this->getKabKotaAPI();

        return view('buyer.contents.profile.profile', compact('page_title', 'current_user', 'kabKota', 'digital_games', 'physical_games', 'buyer_for_transactions', 'communities', 'games_count', 'communities_count', 'isSeller'));
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

    public function transactionProcesses(Request $request)
    {
        $page_title = 'GameX | Transaction Processes';

        $transactions = Transactions::select('*', 'transactions.id', 'users.name as buyer_name', 'games.name as game_name')
            ->join('buyers', 'buyers.id', '=', 'transactions.buyer_id')
            ->join('users', 'users.id', '=', 'buyers.user_id')
            ->join('games', 'games.id', '=', 'transactions.game_id')
            ->where('transactions.seller_id', $this->getUserSellerId($request))
            ->get();

        return view('seller.contents.store.transaction_processes', compact('page_title', 'transactions'));
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

        $ongoing_transactions = Transactions::select('*', 'transactions.id', 'users.name as buyer_name', 'games.name as game_name', 'transactions.status', 'transactions.seller_id')
            ->join('buyers', 'buyers.id', '=', 'transactions.buyer_id')
            ->join('users', 'users.id', '=', 'buyers.user_id')
            ->join('games', 'games.id', '=', 'transactions.game_id')
            ->where('seller_id',  $this->getUserSellerId($request))
            ->where(function ($query) {
                $query->where('status', 'PROCESS')
                    ->orWhere('status', 'DELIVERY');
            })
            ->get();

        // dd($ongoing_transactions);

        // dd($this->getUserSellerId($request));

        $transactions_history = Transactions::select('*', 'transactions.id', 'users.name as buyer_name', 'games.name as game_name', 'transactions.status', 'transactions.seller_id')
            ->join('buyers', 'buyers.id', '=', 'transactions.buyer_id')
            ->join('users', 'users.id', '=', 'buyers.user_id')
            ->join('games', 'games.id', '=', 'transactions.game_id')
            ->where('seller_id',  $this->getUserSellerId($request))
            ->where(function ($query) {
                $query->where('status', 'SUCCESS')
                    ->orWhere('status', 'FAILED');
            })
            ->get();

        return view('seller.contents.profile.profile', compact(
            'page_title',
            'current_seller',
            'products_count',
            'transactions_count',
            'kabKota',
            'ongoing_transactions',
            'transactions_history'
        ));
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
        $transactions = Transactions::select('*', 'transactions.id', 'users.name as buyer_name', 'transactions.status')
            ->join('buyers', 'buyers.id', '=', 'transactions.buyer_id')
            ->join('sellers', 'sellers.id', '=', 'transactions.seller_id')
            ->join('users', 'users.id', '=', 'buyers.user_id')
            ->join('games', 'games.id', '=', 'transactions.game_id')
            ->get();

        $sellers = Sellers::select("*", 'sellers.id')
            ->join('users', 'users.id', '=', 'sellers.user_id')
            ->get();
        return view('admin.contents.transactions.transactions', compact('page_title', 'transactions', 'sellers'));
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
