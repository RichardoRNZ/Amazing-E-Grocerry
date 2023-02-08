<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function storeDataToSession()
    {

        Session::put('first_name',Auth::user()->first_name);
        Session::put('last_name',Auth::user()->last_name);
        Session::put('email',Auth::user()->email);
        Session::put('picture',Auth::user()->display_picture_link);
        Session::put('role',Auth::user()->getRole->name);

    }
    public function index()
    {
        return view('login');
    }
    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email must be filled',
            'password.required' => 'Password must be filled'
        ]);

        $credentials = [
            'email' => $request->email,
            'password'=> $request->password
        ];

        // $userid = Auth::user()->id;
        // $users = User::where('id',$userid)->first();
        // $user[$userid] =[
        //     "first_name" => $users->first_name,
        //     "last_name" => $users->last_name,
        //     "role" => $users->getRole->name,
        //     "gender" => $users->getGender->gender_desc,
        //     "email" => $users->email,
        //     "image" => $users->display_picture_link


        // ];
        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();


            $this->storeDataToSession();
            Session::put('login',true);
            return redirect()->route('home')->with('success','Login Success');


        }
        else{
            return redirect()->back()->with('success','Login Failed');
        }
    }
    private function newImage(Request $request)
    {
        $fileObj = $request->file('image');
        $name = $fileObj->getClientOriginalName();
        $ext = $fileObj->getClientOriginalExtension();
        $new_file_name = $name . time() . '.' .$ext;
        $fileObj->storeAs('public/images', $new_file_name);
        return $new_file_name;
    }
    public function Register(Request $request)
    {

        $request->validate([
            'first_name' => 'required|max:25|alpha_num',
            'last_name' => 'required|max:25|alpha_num',
            'email' => 'required|unique:accounts|email',
            'gender' => 'required',
            'role' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'image' => 'required|file|image|mimes:jpg,jpeg,png'
        ]);
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->role_id = $request->role;
        $user->gender_id = $request->gender;
        $user->email = $request->email;
        $user->display_picture_link = $this->newImage($request);
        $user->password = Hash::make($request->password);
        $user->save();




       return  $this->Login($request);

    }

    public function updateProfile(Request $request)
    {


        $request->validate([
            'first_name' => 'required|max:25|alpha_num',
            'last_name' => 'required|max:25|alpha_num',
            'email' => 'required|email',
            'gender' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'image' => 'required|file|image|mimes:jpg,jpeg,png'
        ]);
        $user = User::find(Auth::user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender_id = $request->gender;
        $user->email = $request->email;
        $user->display_picture_link = $this->newImage($request);
        $user->password = Hash::make($request->password);
        $user->update();
        Session::forget(['first_name','last_name','email','picture','role']);
        $this->storeDataToSession();
        return redirect()->route('home')->with('success',"Update Profile Success");



    }
    public function logOut()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('index')->with('success','Sign Out Success');
    }

}
