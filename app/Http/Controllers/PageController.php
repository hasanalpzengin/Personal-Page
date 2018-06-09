<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\ContentModel;

class PageController extends Controller
{
  public function projects(){
    $content = ContentModel::getProjects();
    return view('projects', compact('content'));
  }
  public function posts(Request $request){
    $content['posts'] = ContentModel::getPosts();
    if ($request->all()!==null) {
      $content['result']['status']=$request->input('status');
      $content['result']['message']=$request->input('message');
    }
    return view('home', compact('content'));
  }
  public function resume(){
    $content = ContentModel::getResume();
    return view('resume', compact('content'));
  }
}
