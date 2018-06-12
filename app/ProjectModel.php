<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use DB;

class ProjectModel extends Model
{
    protected static $TABLE = 'projects';

    protected static function addProject($name, $text, $link){
      try {
        DB::table(ProjectModel::$TABLE)->insert(['name'=>$name,
        'text'=>$text,
        'link'=>$link,
        'date'=>date('Y-m-d H:i:s')]);
        $result['status']='success';
        $result['message']='Insert Success';
      }catch(QueryException $ex){
        $result['status']='error';
        $result['message']=$ex->getMessage();
      }
      return $result;
    }
    protected static function getProjects(){
      try{
        $result['list'] = DB::table(ProjectModel::$TABLE)->get();
      }catch(QueryException $ex){
        $result['status']='error';
        $result['message']=$ex->getMessage();
      }
      return $result;
    }
    protected static function getProject($id){
      try{
        $result['content'] = DB::table(ProjectModel::$TABLE)->where('id',$id)->get()->first();
      }catch(QueryException $ex){
        $result['status']='error';
        $result['message']=$ex->getMessage();
      }
      return $result;
    }
    protected static function deleteProject($id){
      try{
        DB::table(ProjectModel::$TABLE)->where('id',$id)->delete();
        $result['status']='success';
        $result['message']='Delete Success';
      }catch(QueryException $ex){
        $result['status']='error';
        $result['message']=$ex->getMessage();
      }
      echo $result['status'];
      return $result;
    }
    protected static function editProject($id, $name, $text, $link){
      try{
        DB::table(ProjectModel::$TABLE)->where('id',$id)->update([
          'name'=>$name,
          'text'=>$text,
          'link'=>$link
        ]);
        $result['status']='success';
        $result['message']='Update Success';
      }catch(QueryException $ex){
        $result['status']='error';
        $result['message']=$ex->getMessage();
      }
      return $result;
    }
}
