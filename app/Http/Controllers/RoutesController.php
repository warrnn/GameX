<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Sellers;
use Illuminate\Http\Request;

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
        $page_title['category_name'] = $request->name;
        $page_title = 'GameX | ' . strtoupper($request->name);
        return view('buyer.contents.store.category', compact('page_title'));
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

    public function profile()
    {
        $page_title = 'GameX | Profile';
        return view('buyer.contents.profile.profile', compact('page_title'));
    }

    public function sellGames(Request $request)
    {
        $page_title = 'GameX | Sell Games';
        return view('seller.contents.store.sell_games', compact('page_title'));
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
        return view('admin.contents.users.users_list', compact('page_title'));
    }

    public function sellerVerification()
    {
        $page_title = 'GameX | Seller Verification';
        return view('admin.contents.users.seller_verification', compact('page_title'));
    }

    public function transactions()
    {
        $page_title = 'GameX | Transactions';
        return view('admin.contents.transactions.transactions', compact('page_title'));
    }

    public function categories()
    {
        $page_title = 'GameX | Categories';
        return view('admin.contents.categories.categories', compact('page_title'));
    }

    public function admins()
    {
        $page_title = 'GameX | Admins';
        return view('admin.contents.admins.admins', compact('page_title'));
    }
}