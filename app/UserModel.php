<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use DB;

class UserModel extends Model
{
    protected static $TABLE = 'users';

    protected static function addUser($username, $password, $mail, $name, $permission){
      try {
        DB::table(UserModel::$TABLE)->insert(['username'=>$username,
        'password'=>$password,
        'permission'=>$permission,
        'mail'=>$mail,
        'name'=>$name,
        'created_at'=>date('Y-m-d H:i:s')]);
        $result['status']='success';
        $result['message']='Insert Success';
      }catch(QueryException $ex){
        $result['status']='error';
        $result['message']=$ex->getMessage();
      }
      return $result;
    }
    protected static function getUsers(){
      try{
        $result['list'] = DB::table(UserModel::$TABLE)->get();
      }catch(QueryException $ex){
        $result['status']='error';
        $result['message']=$ex->getMessage();
      }
      return $result;
    }
    protected static function getUser($id){
      try{
        $result['content'] = DB::table(UserModel::$TABLE)->where('id',$id)->get()->first();
      }catch(QueryException $ex){
        $result['status']='error';
        $result['message']=$ex->getMessage();
      }
      return $result;
    }
    protected static function deleteUser($id){
      try{
        DB::table(UserModel::$TABLE)->where('id',$id)->delete();
        $result['status']='success';
        $result['message']='Delete Success';
      }catch(QueryException $ex){
        $result['status']='error';
        $result['message']=$ex->getMessage();
      }
      echo $result['status'];
      return $result;
    }
    protected static function editUser($id, $username, $password, $mail, $name, $permission){
      try{
        DB::table(UserModel::$TABLE)->where('id',$id)->update([
          'username'=>$username,
          'password'=>$password,
          'mail'=>$mail,
          'permission'=>$permission,
          'name'=>$name]);
        $result['status']='success';
        $result['message']='Update Success';
      }catch(QueryException $ex){
        $result['status']='error';
        $result['message']=$ex->getMessage();
      }
      return $result;
    }
}
