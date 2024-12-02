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

    public function games() {
        $data['page_title'] = 'GameX | Games';
        // return view('buyer.contents.games', compact('data'));
    }

    public function profile() {
        $data['page_title'] = 'GameX | Profile';
        return view('buyer.contents.profile.profile', compact('data'));
    }
}