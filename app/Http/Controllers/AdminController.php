<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\AdminModel;

class AdminController extends Controller
{
  protected function home(Request $request){
    $content['list'] = AdminModel::getPosts();
    if ($request->all()!==null) {
      $content['result']['status']=$request->input('status');
      $content['result']['message']=$request->input('message');
    }
    return view('admin/home', compact('content'));
  }

  protected function posts_control(Request $request){
    $content['list'] = AdminModel::getPosts();
    if ($request->all()!==null) {
      $content['result']['status']=$request->input('status');
      $content['result']['message']=$request->input('message');
    }
    return view('admin/posts', compact('content'));
  }
  protected function users_control(Request $request){
    $content['list'] = AdminModel::getUsers();
    if ($request->all()!==null) {
      $content['result']['status']=$request->input('status');
      $content['result']['message']=$request->input('message');
    }
    return view('admin/users', compact('content'));
  }
  protected function projects_control(Request $request){
    $content['list'] = AdminModel::getProjects();
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
