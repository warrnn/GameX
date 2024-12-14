<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function index() {
        $data['page_title'] = 'GameX';
        return view('guest.contents.index', compact('data'));
    }

    public function store() {
        $data['page_title'] = 'GameX | Store';
        return view('buyer.contents.store.store', compact('data'));
    }

    public function detail() {
        $data['page_title'] = 'GameX | Detail';
        return view('buyer.contents.store.detail', compact('data'));
    }

    public function payment() {
        $data['page_title'] = 'GameX | Payment';
        return view('buyer.contents.store.payment', compact('data'));
    }

    public function offers() {
        $data['page_title'] = 'GameX | Offers';
        return view('buyer.contents.store.offers', compact('data'));
    }

    public function category(Request $request) {
        $data['category_name'] = $request->name;
        $data['page_title'] = 'GameX | ' . strtoupper($request->name);
        return view('buyer.contents.store.category', compact('data'));
    }

    public function community() {
        $data['page_title'] = 'GameX | Community';
        return view('buyer.contents.community.community', compact('data'));
    }

    public function theComunities() {
        $data['page_title'] = 'GameX | The Communities';
        return view('buyer.contents.community.the_communities', compact('data'));
    }

    public function myComunities() {
        $data['page_title'] = 'GameX | My Communities';
        return view('buyer.contents.community.my_communities', compact('data'));
    }

    public function detailCommunity() {
        $data['page_title'] = 'GameX | Detail Community';
        return view('buyer.contents.community.detail', compact('data'));
    }

    public function games() {
        $data['page_title'] = 'GameX | My Games';
        return view('buyer.contents.games.games', compact('data'));
    }

    public function play() {
        $data['page_title'] = 'GameX | Play';
        return view('buyer.contents.games.play', compact('data'));
    }

    public function profile() {
        $data['page_title'] = 'GameX | Profile';
        return view('buyer.contents.profile.profile', compact('data'));
    }

    public function sellGames() {
        $data['page_title'] = 'GameX | Sell Games';
        return view('seller.contents.store.sell_games', compact('data'));
    }

    public function managePromotion() {
        $data['page_title'] = 'GameX | Manage Promotion';
        return view('seller.contents.store.manage_promotions', compact('data'));
    }

    public function transactionProcesses() {
        $data['page_title'] = 'GameX | Transaction Processes';
        return view('seller.contents.store.transaction_processes', compact('data'));
    }

    public function sellerProfile() {
        $data['page_title'] = 'GameX | Seller Profile';
        return view('seller.contents.profile.profile', compact('data'));
    }

    public function usersList() {
        $data['page_title'] = 'GameX | Users List';
        return view('admin.contents.users.users_list', compact('data'));
    }

    public function sellerVerification() {
        $data['page_title'] = 'GameX | Seller Verification';
        return view('admin.contents.users.seller_verification', compact('data'));
    }

    public function transactions() {
        $data['page_title'] = 'GameX | Transactions';
        return view('admin.contents.transactions.transactions', compact('data'));
    }

    public function categories() {
        $data['page_title'] = 'GameX | Categories';
        return view('admin.contents.categories.categories', compact('data'));
    }

    public function admins() {
        $data['page_title'] = 'GameX | Admins';
        return view('admin.contents.admins.admins', compact('data'));
    }
}