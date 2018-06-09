<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\LoginModel;

class LoginController extends Controller
{
    public function doLogin(Request $req){
      $user_id = $req->session()->get('id',-1);
      if($user_id == -1){
        $username = $req->input('uname');
        $password = $req->input('pwd');
        $user = LoginModel::getLogin($username, $password);
        if (isset($user)) {
          if (Hash::check($password, $user->password)) {
            session(['id'=>$user->id]);
            $status='success';
            $message='Log-in Success';
          }else{
            $status='error';
            $message='Wrong Password';
          }
        }else{
          $status='error';
          $message='Wrong Username';
        }
      }else{
        $status='error';
        $message='Exist Session Data. Logout first to log-in';
      }
      return redirect()->action('PageController@posts', ['status'=>$status, 'message'=>$message]);
    }

    public function logout(Request $req){
      $req->session()->forget('id');
      return redirect('home');
    }
}
