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
  public function posts(){
    $content = ContentModel::getPosts();
    return view('home', compact('content'));
  }
  public function resume(){
    $content = ContentModel::getResume();
    return view('resume', compact('content'));
  }
}
