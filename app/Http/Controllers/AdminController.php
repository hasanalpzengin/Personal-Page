<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\PostModel;

class AdminController extends Controller
{
  protected function users_control(Request $request){
    $content['list'] = AdminModel::getUsers();
    if ($request->all()!==null) {
      $content['result']['status']=$request->input('status');
      $content['result']['message']=$request->input('message');
    }
    return view('admin/users', compact('content'));
  }
  protected function projects_control(Request $request){
    $content['list'] = PostModel::getProjects();
    if ($request->all()!==null) {
      $content['result']['status']=$request->input('status');
      $content['result']['message']=$request->input('message');
    }
    return view('admin/posts', compact('content'));
  }
  protected function resume_control(Request $request){
    $content['list'] = AdminModel::getResume();
    if ($request->all()!==null) {
      $content['result']['status']=$request->input('status');
      $content['result']['message']=$request->input('message');
    }
    return view('admin/posts', compact('content'));
  }
}
