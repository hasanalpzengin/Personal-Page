<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ContentModel extends Model
{
  protected static $PROJECTS_TABLE = 'projects';
  protected static $POSTS_TABLE = 'posts';
  protected static $RESUME_TABLE = 'resume';

  protected static function getProjects(){
    $projects = DB::table(ContentModel::$PROJECTS_TABLE)->get();
    return $projects;
  }
  protected static function getProject($id){
    $projects = DB::table(ContentModel::$PROJECTS_TABLE)->where(['id'=>$id])->get();
    return $projects;
  }
  protected static function getPosts(){
    $posts = DB::table(ContentModel::$POSTS_TABLE)->get();
    return $posts;
  }
  protected static function getPost($id){
    $post = DB::table(ContentModel::$POSTS_TABLE)->where(['id'=>$id])->get();
    return $post;
  }
  protected static function getResume(){
    $resume = DB::table(ContentModel::$RESUME_TABLE)->get()->first();
    return $resume;
  }
}
