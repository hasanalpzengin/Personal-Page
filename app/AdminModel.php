<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class AdminModel extends Model
{
  protected static $PROJECTS_TABLE = 'projects';
  protected static $POSTS_TABLE = 'posts';
  protected static $RESUME_TABLE = 'resume';
  protected static $USERS_TABLE = 'users';

  protected static function getProjects(){
    $projects = DB::table(AdminModel::$PROJECTS_TABLE)->get();
    return $projects;
  }
  protected static function getProject($id){
    $projects = DB::table(AdminModel::$PROJECTS_TABLE)->where(['id'=>$id])->get();
    return $projects;
  }
  protected static function getUsers(){
    $users = DB::table(AdminModel::$USERS_TABLE)->get();
    return $users;
  }
  protected static function getUser($id){
    $users = DB::table(AdminModel::$USERS_TABLE)->where(['id'=>$id])->get();
    return $users;
  }
  protected static function getResume(){
    $resume = DB::table(ContentModel::$RESUME_TABLE)->get()->first();
    return $resume;
  }
}
