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
}