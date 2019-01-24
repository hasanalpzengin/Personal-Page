<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Log;

class UsersController extends Controller
{
    public function showLogin(){
        return view('pages.login');
    }

    public function login(Request $request){
        $result = User::whereRaw('username=?', array($request->username))->find(1);
        //username check
        if($result){
            //password check
            if(Hash::check($request->password, $result->password)){
                //set session
                $request->session()->put('id',$result->id);
                $request->session()->put('username',$result->username);
                $request->session()->put('permission',$result->permission);
                
                return view('welcome');
            }else{
                return view('pages.login', ['error'=>'Wrong password']);
            }
        }else{
            return view('pages.login', ['error'=>'Wrong username']);
        }
    }

    public function logout(Request $request){
        $request->session()->forget('id');
        $request->session()->forget('username');
        $request->session()->forget('permission');
        $request->session()->flush();
        return Redirect::back();
    }

    public function update(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>7){
                $user = User::where('id', $request->id)->first();
                $user->username = $request->username;
                $user->name = $request->name;
                if($request->password){
                    $user->password = Hash::make($request->password);
                }
                $user->surname = $request->surname;
                $user->permission = $request->permission;
                $user->gender = strtoupper($request->gender);
                $user->email = $request->email;
                $user->save();
                //create log
                $log = new Log;
                $log->uid = $request->session()->get('id');
                $log->log = $request->id." User Updated";
                $log->save();
                return redirect('/users');
            }else{
                return view('pages.error', ['error'=>"You don't have enough permission"]);
            }
        }else{
            return view('pages.error', ['error' => "You have to be logged in to view this page"]);
        }
    }

    public function showEditProfile(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>5){
                $user = User::where('id', $request->session()->get('id'))->first();
                return view('pages.editProfile', ["user"=>$user]);
            }else{
                return view('pages.error', ['error' => "You don't have enough permission"]);
            }
        }else{
            return view('pages.error', ['error' => "You have to be logged in to view this page"]);
        }
    }

    public function editProfile(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>5){
                $user = User::where('id', $request->session()->get('id'))->first();
                $user->username = $request->username;
                //is password change recieved
                if(strlen($request->password)>0){
                    $user->password = Hash::make($request->password);
                }
                $user->name = $request->name;
                $user->surname = $request->surname;
                $user->email = $request->email;
                $user->gender = strtoupper($request->gender);
                $user->save();
                //create log
                $log = new Log;
                $log->uid = $request->session()->get('id');
                $log->log = "User Updated Profile";
                $log->save();
                return redirect('/profile');
            }else{
                return view('pages.error', ['error'=>"You don't have enough permission"]);
            }
        }else{
            return view('pages.error', ['error' => "You have to be logged in to view this page"]);
        }
    }

    public function showProfile($id){
        $user = User::where('id', $id)->first();
        return view('pages.profile', ['user'=>$user]);
    }

    public function showNew(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>7){
                return view('pages.users.new');
            }else{
                return view('pages.error', ['error'=>"You don't have enough permission"]);
            }
        }else{
            return view('pages.error', ['error' => "You have to be logged in to view this page"]);
        }
    }

    public function create(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>7){
                $user = new User();
                $user->username = $request->username;
                $user->password = Hash::make($request->password);
                $user->name = ucfirst($request->name);
                $user->surname = ucfirst($request->surname);
                $user->gender = ucfirst($request->gender);
                $user->email = $request->email;
                $user->permission = (int)$request->permission;
                $user->save();
                //create log
                $log = new Log;
                $log->uid = $request->session()->get('id');
                $log->log = $request->username." User Created";
                $log->save();
                return redirect('/users');
            }else{
                return view('pages.error', ['error'=>"You don't have enough permission"]);
            }
        }else{
            return view('pages.error', ['error' => "You have to be logged in to view this page"]);
        }
    }

    public function delete(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>7){
                User::where('id', $request->id)->delete();
                //create log
                $log = new Log;
                $log->uid = $request->session()->get('id');
                $log->log = $request->id." User Removed";
                $log->save();
                return redirect('/users');
            }else{
                return view('pages.error', ['error'=>"You don't have enough permission"]);
            }
        }else{
            return view('pages.error', ['error' => "You have to be logged in to view this page"]);
        }
    }

    public function showEdit(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>7){
                $user = User::where('id', $request->id)->first();
                return view('pages.users.edit',['user'=>$user]);
            }else{
                return view('pages.error', ['error'=>"You don't have enough permission"]);
            }
        }else{
            return view('pages.error', ['error' => "You have to be logged in to view this page"]);
        }
    }

    public function list(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>7){
                $users = User::all();
                return view('pages.users', ['users'=>$users]);
            }else{
                return view('pages.error', ['error'=>"You don't have enough permission"]);
            }
        }else{
            return view('pages.error', ['error' => "You have to be logged in to view this page"]);
        }
    }
}
