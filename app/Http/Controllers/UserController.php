<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use App\Models\User;
use Mockery\Generator\StringManipulation\Pass\Pass;
use PhpOption\None;

class UserController extends Controller
{
    public  static $user ;
    function login(Request $req)
    {
        $user= User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return "Username or password is not matched";
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/products');
        }
    }
    
    public function logout(Request $req) 
    {
        $req->session()->forget('user');
        return redirect('/login');
    }

    function signup(Request $req)
    {
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->created_at = date("Y/m/d");
        $user->updated_at = date("Y/m/d");
        if ($req->hasFile('image')) {
            $avatar = $req->file('image');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('avatars/' . $filename));
            $user->avatar = public_path('avatars/' . $filename);
        } 
        $user->location = $req->location;
        $user->phone_number = $req->phone_number;
        $user->credit = $req->credit;
        $user->save();
        return redirect('/products');
    }
    function newAvatar(Request $req){
        $user = $req->session()->get('user');
        if ($req->hasFile('image')) {
            $avatar = $req->file('image');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('avatars/' . $filename));
            $user->avatar = public_path('avatars/' . $filename);
        }
        return redirect('userprofile');
    }
}
