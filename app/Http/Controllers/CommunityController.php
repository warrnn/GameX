<?php

namespace App\Http\Controllers;

use App\Models\Communities;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function addCommunity(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg',
                'name' => 'required',
                'relategame' => 'required',
                'communitydes' => 'required',
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('public/community_images');
        }

        $name = $request->name;
        $relategame = $request->relategame;
        $communitydes = $request->file('communitydes')->store('public/community_descriptions');

        Communities::create([
            'image' => $image,
            'name' => $name,
            'related_game' => $relategame,
            'description' => $communitydes,
        ]);

        return redirect()->route('community.index')->with('success', 'Community Created Successfully');
    }
}