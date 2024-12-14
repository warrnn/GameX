<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Sell_details;
use Illuminate\Http\Request;
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
                'portrait_image' => 'required | image | mimes:jpeg,png,jpg | max:4096',
                'landscape_image' => 'required | image | mimes:jpeg,png,jpg | max:4096'
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
                'seller_id' => $request->session()->get('seller_id'),
                'game_id' => $game->id
            ]);

            return redirect()->route('seller.sellGames')->with('success', 'Game Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Image Upload Failed');
        }
    }
}
