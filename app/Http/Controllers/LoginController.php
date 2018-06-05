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
            $result['status']='success';
          }else{
            $result['status']='error';
            $result['message']='Wrong Password';
          }
        }else{
          $result['status']='error';
          $result['message']='Wrong Username';
        }
      }else{
        $result['status']='error';
        $result['message']='Exist Session Data. Logout first to log-in';
      }
      sleep(1);
      return redirect('/home')->->with($result);
    }
}
