<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Sell_details;
use App\Models\Sellers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class SellGamesController extends Controller
{
    public function addGame(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required | numeric',
                'category_id' => 'required',
                'publisher' => 'required',
                'release_date' => 'required',
                'base' => 'required',
                'description' => 'required',
                'portrait_image' => 'mimes:jpeg,png,jpg | max:4096',
                'landscape_image' => 'mimes:jpeg,png,jpg | max:4096'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        $name = $request->name;
        $price = $request->price;
        $category_id = $request->category_id;
        $publisher = $request->publisher;
        $release_date = $request->release_date;
        $base = $request->base;
        $description = $request->description;
        $portrait_image = $request->portrait_image;
        $landscape_image = $request->landscape_image;

        if ($request->hasFile('portrait_image') && $request->hasFile('landscape_image')) {
            $uuid = Uuid::uuid4()->toString();

            $portrait_image = $request->file('portrait_image');
            $landscape_image = $request->file('landscape_image');

            $portraitFileName = $uuid . "_potrait" . "." . $portrait_image->getClientOriginalExtension();
            $landscapeFileName = $uuid  . "_landscape" .  "." . $landscape_image->getClientOriginalExtension();

            $portraitFilePath = 'games/' . $portraitFileName;
            $landscapeFilePath = 'games/' . $landscapeFileName;

            $portrait_image->storeAs('games/', $portraitFileName, 'public');
            $landscape_image->storeAs('games/', $landscapeFileName, 'public');

            $game = Games::create([
                'id' => $uuid,
                'name' => $name,
                'price' => $price,
                'category_id' => $category_id,
                'publisher' => $publisher,
                'release_date' => $release_date,
                'base' => $base,
                'description' => $description,
                'portrait_image_path' => $portraitFilePath,
                'landscape_image_path' => $landscapeFilePath
            ]);

            Sell_details::create([
                'seller_id' => $this->getUserSellerId($request),
                'game_id' => $game->id
            ]);

            return redirect()->route('seller.sellGames')->with('success', 'Game Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Image Upload Failed');
        }
    }

    public function updateGame(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required|numeric',
                'category_id' => 'required',
                'publisher' => 'required',
                'release_date' => 'required',
                'base' => 'required',
                'description' => 'required',
                'portrait_image' => 'mimes:jpeg,png,jpg|max:4096',
                'landscape_image' => 'mimes:jpeg,png,jpg|max:4096'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        $game_id = $request->game_id;
        $name = $request->name;
        $price = $request->price;
        $category_id = $request->category_id;
        $publisher = $request->publisher;
        $release_date = $request->release_date;
        $base = $request->base;
        $description = $request->description;

        $game = Games::where('id', $game_id)->first();

        if ($request->hasFile('portrait_image')) {
            Storage::disk('public')->delete($game->portrait_image_path);

            $portrait_image = $request->file('portrait_image');
            $portraitFileName = $game_id . "_portrait." . $portrait_image->getClientOriginalExtension();
            $portraitFilePath = 'games/' . $portraitFileName;
            $portrait_image->storeAs('games', $portraitFileName, 'public');

            $game->portrait_image_path = $portraitFilePath;
        }

        if ($request->hasFile('landscape_image')) {
            Storage::disk('public')->delete($game->landscape_image_path);

            $landscape_image = $request->file('landscape_image');
            $landscapeFileName = $game_id . "_landscape." . $landscape_image->getClientOriginalExtension();
            $landscapeFilePath = 'games/' . $landscapeFileName;
            $landscape_image->storeAs('games', $landscapeFileName, 'public');

            $game->landscape_image_path = $landscapeFilePath;
        }

        $game->name = $name;
        $game->price = $price;
        $game->category_id = $category_id;
        $game->publisher = $publisher;
        $game->release_date = $release_date;
        $game->base = $base;
        $game->description = $description;
        $game->save();

        return redirect()->route('seller.sellGames')->with('success', $name . ' Updated Successfully!');
    }

    public function deleteGame(Request $request)
    {
        try {
            $seller_id  = $request->seller_id;
            $game_id = $request->game_id;

            Storage::disk('public')->delete(Games::where('id', $game_id)->first()->portrait_image_path);
            Storage::disk('public')->delete(Games::where('id', $game_id)->first()->landscape_image_path);

            Sell_details::where('seller_id', $seller_id)->where('game_id', $game_id)->delete();
            Games::where('id', $game_id)->delete();

            return redirect()->back()->with('success', 'Game Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function getUserSellerId(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $seller_id = Sellers::where('user_id', $user_id)->first();

        return $seller_id->id;
    }
}
