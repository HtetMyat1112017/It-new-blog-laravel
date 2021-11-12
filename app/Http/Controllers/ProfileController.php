<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use App\User;
//use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public  function index(){
        return view('user_profile.profile');
    }
    public  function edit(){

        return view('user_profile.changeProfile');
    }
   public function changeName(){
        return view('user_profile.changeName');
   }
    public function changeEmail(){
        return view('user_profile.changeName');
    }
    public function changePassword(){
        return view('user_profile.changePassword');
    }
    public function changePhoto(){
        return view('user_profile.changeProfile');
    }

   public function updateName(Request $request){
       $request->validate([
           'name' => "required|min:3|max:50",
       ]);
        $user=User::find(Auth::id());
        $user->name=$request->name;
        $user->update();
        return  redirect()->route('profile.changeName');
   }


    public function updateEmail(Request $request){
        $request->validate([
            'email' => "required|min:3|max:50",
        ]);
        $user=User::find(Auth::id());
        $user->email=$request->email;
        $user->update();

       return  redirect()->route('profile.changeEmail');
    }


    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => ['required', new MatchOldPassword()],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

       return redirect()->route("profile.changePassword");
    }
    public function updatePhoto(Request $request){
        $request->validate([
            "photo"=>"require"
        ]);

        $dir="store/";
        File::delete($dir.auth()->user()->photo);

        $file=$request->file('image');
        $newName=uniqid()."".$file->getClientOriginalName();
        $file->move($dir,$newName);
        $user=User::find(auth()->user()->id);
        $user->photo=$newName;
        $user->update();
        return redirect()->route('profile.changePhoto');
    }
}
