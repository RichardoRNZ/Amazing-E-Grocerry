<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function manageAccount()
    {
        $users = User::all();
        return view('admin-page.manage-account',compact('users'));
    }
    public function updateRole(Request $request)
    {
        $user = User::find($request->id);
        $user->role_id = $request->role;
        $user->update();

        return redirect()->back()->with('success','Update Role Success');
    }
    public function deleteAccountById(Request $request)
    {
        User::where('id',$request->id)->delete();
        return redirect()->back()->with('success','Delete Account Success');
    }
}
