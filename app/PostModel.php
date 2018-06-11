<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use DB;

class PostModel extends Model
{
    protected static $TABLE = 'posts';

    protected static function addPost($author_id, $title, $text){
      try {
        DB::table(PostModel::$TABLE)->insert(['title'=>$title,
        'text'=>$text,
        'author_id'=>$author_id,
        'date'=>date('Y-m-d H:i:s')]);
        $result['status']='success';
        $result['message']='Insert Success';
      }catch(QueryException $ex){
        $result['status']='error';
        $result['message']=$ex->getMessage();
      }
      return $result;
    }
    protected static function getPosts(){
      try{
        $result['list'] = DB::table(PostModel::$TABLE)->get();
      }catch(QueryException $ex){
        $result['status']='error';
        $result['message']=$ex->getMessage();
      }
      return $result;
    }
    protected static function getPost($id){
      try{
        $result['content'] = DB::table(PostModel::$TABLE)->where('id',$id)->get()->first();
      }catch(QueryException $ex){
        $result['status']='error';
        $result['message']=$ex->getMessage();
      }
      return $result;
    }
    protected static function deletePost($id){
      try{
        DB::table(PostModel::$TABLE)->where('id',$id)->delete();
        $result['status']='success';
        $result['message']='Delete Success';
      }catch(QueryException $ex){
        $result['status']='error';
        $result['message']=$ex->getMessage();
      }
      echo $result['status'];
      return $result;
    }
    protected static function editPost($id, $title, $text){
      try{
        DB::table(PostModel::$TABLE)->where('id',$id)->update(['title'=>$title, 'text'=>$text]);
        $result['status']='success';
        $result['message']='Update Success';
      }catch(QueryException $ex){
        $result['status']='error';
        $result['message']=$ex->getMessage();
      }
      return $result;
    }
}
