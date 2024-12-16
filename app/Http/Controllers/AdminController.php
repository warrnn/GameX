<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Categories;
use App\Models\Sellers;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function verifySeller(Request $request)
    {
        $seller_id = $request->seller_id;

        Sellers::where('id', $seller_id)->update([
            'status' => 'ACTIVE'
        ]);

        return redirect()->route('admin.sellerVerification')->with('success', 'Seller Verified Successfully');
    }

    public function addCategory(Request $request)
    {
        try {
            $request->validate([
                'category' => 'required',
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        $category = $request->category;

        Categories::create([
            'name' => $category
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category Added Successfully');
    }

    public function editCategory(Request $request)
    {
        try {
            $request->validate([
                'category' => 'required',
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        $category_id = $request->category_id;
        $category_name = $request->category;

        Categories::where('id', $category_id)->update([
            'name' => $category_name
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category Updated Successfully');
    }

    public function deleteCategory(Request $request)
    {
        $category_id = $request->category_id;

        Categories::where('id', $category_id)->delete();

        return redirect()->route('admin.categories')->with('success', 'Category Deleted Successfully');
    }

    public function addAdmin(Request $request)
    {
        try {
            $request->validate([
                'user' => 'required',
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        $user_id = $request->user;

        if (Admins::where('user_id', $user_id)->exists()) {
            return redirect()->back()->with('error', 'User Already Added as Admin');
        } else {
            Admins::create([
                'user_id' => $user_id
            ]);

            return redirect()->route('admin.admins')->with('success', 'Admin Added Successfully');
        }
    }

    public function deleteAdmin(Request $request)
    {
        $admin_id = $request->admin_id;

        Admins::where('id', $admin_id)->delete();

        return redirect()->route('admin.admins')->with('success', 'Admin Deleted Successfully');
    }
}
