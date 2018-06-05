<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class PageController extends Controller
{
    public function getProjects(){
      $projects = DB::table('projects')->get();
      return $projects;
    }
    public function getProject($id){
      $projects = DB::table('projects')->where(['id'=>$id])->get();
      return $projects;
    }
    public function projects(){
      $content = $this->getProjects();
      return view('projects', compact('content'));
    }
    public function getPosts(){
      $posts = DB::table('posts')->get();
      return $posts;
    }
    public function getPost($id){
      $post = DB::table('post')->where(['id'=>$id])->get();
      return $post;
    }
    public function posts(){
      $content = $this->getPosts();
      return view('home', compact('content'));
    }
    public function getResume(){
      $resume = DB::table('resume')->get()->first();
      return $resume;
    }
    public function resume(){
      $content = $this->getResume();
      return view('resume', compact('content'));
    }
}
