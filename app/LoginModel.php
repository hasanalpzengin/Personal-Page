<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class LoginModel extends Model
{
    protected static $TABLE = 'users';
    protected static function getLogin($username, $password){
      $user = DB::table(LoginModel::$TABLE)->where(['username'=>$username])->get()->first();
      return $user;
    }
}
