<?php

namespace App\Http\Controllers;

use App\Models\Communities;
use App\Models\Detail_joins;
use App\Models\Posts;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class CommunityController extends Controller
{
    public function addCommunity(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg|max:4096',
                'name' => 'required',
                'related_game' => 'required',
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        if ($request->hasFile('image')) {
            $uuid = Uuid::uuid4()->toString();

            $image = $request->file('image');
            $image_name = $uuid . '.' . $image->getClientOriginalExtension();
            $image_path = 'communities/' . $image_name;
            $image->storeAs('communities/', $image_name, 'public');

            $name = $request->name;
            $relategame = $request->related_game;

            Communities::create([
                'id' => Uuid::uuid4()->toString(),
                'name' => $name,
                'related_game' => $relategame,
                'image_path' => $image_path,
            ]);

            return redirect()->route('buyer.theComunities')->with('success', 'Community Created Successfully');
        }

        return redirect()->back()->with('error', 'An Error Occurred, Please Try Again');
    }

    public function joinCommunity(Request $request)
    {
        $community_id = $request->community_id;
        $user_id = $request->session()->get('user_id');

        Detail_joins::create([
            'user_id' => $user_id,
            'community_id' => $community_id
        ]);

        return redirect()->back()->with('success', 'Community Joined Successfully');
    }

    public function leaveCommunity(Request $request)
    {
        $community_id = $request->community_id;
        $user_id = $request->session()->get('user_id');

        Detail_joins::where('user_id', $user_id)->where('community_id', $community_id)->delete();

        return redirect()->route('buyer.community')->with('success', 'Community Left Successfully');
    }

    public function addPost(Request $request)
    {
        try {
            $request->validate([
                'content' => 'required',
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        $community_id = $request->community_id;
        $user_id = $request->session()->get('user_id');
        $content = $request->content;

        Posts::create([
            'content' => $content,
            'user_id' => $user_id,
            'community_id' => $community_id
        ]);

        return redirect()->back()->with('success', 'Post Added Successfully');
    }
}
