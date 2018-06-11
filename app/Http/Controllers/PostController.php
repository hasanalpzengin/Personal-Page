<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\PostModel;


class PostController extends Controller
{
  protected function add(Request $request){
    if ($request->input('status')!==null) {
      $content['status']=$request->input('status');
      $content['message']=$request->input('message');
    }else{
      if ($request->session()->get('id')!==null) {
        $content=PostModel::addPost($request->session()->get('id'), $request->title, $request->text);
      }else{
        $content['status']="error";
        $content['message']="Access Denied";
      }
    }
    return view('admin/post/add', compact('content'));
  }
  protected function control(Request $request){
    if ($request->status!==null) {
      $content['status']=$request->status;
      $content['message']=$request->message;
    }
    if ($request->session()->get('id')!==null) {
      $result = PostModel::getPosts();
      if (isset($result['status'])) {
        $content['status'] = $result['status'];
        $content['message'] = $result['message'];
      }
      $content['list'] = $result['list'];
    }else{
      $content['status']="error";
      $content['message']="Access Denied";
    }
    return view('admin/post/main', compact('content'));
  }
  protected function add_view(Request $request){
    if ($request->input('status')!==null) {
      $content['status']=$request->input('status');
      $content['message']=$request->input('message');
    }
    return view('admin/post/add', compact('content'));
  }
  protected function edit_view(Request $request, $id){
    if ($request->input('status')!==null) {
      $content['status'] = $request->input('status');
      $content['message'] = $request->input('message');
    }
    if ($request->session()->get('id')!==null) {
      $content = PostModel::getPost($id);
    }else{
      $content['status']="error";
      $content['message']="Access Denied";
    }
    return view('admin/post/edit', compact('content'));
  }
  protected function edit(Request $request){
    if ($request->input('status')!==null) {
      $status=$request->input('status');
      $message=$request->input('message');
    }else{
      if ($request->session()->get('id')!==null) {
        $result=PostModel::editPost($request->id, $request->title, $request->text);
        $status = $result['status'];
        $message = $result['message'];
      }else{
        $status="error";
        $message="Access Denied";
      }
    }
    return redirect()->action('PostController@control', ['status'=>$status, 'message'=>$message]);
  }
  protected function delete(Request $request, $id){
    if ($request->input('status')!==null) {
      $status="error";
      $message="Access Denied";
    }else{
      if ($request->session()->get('id')!==null) {
        $result=PostModel::deletePost($id);
        $status = $result['status'];
        $message = $result['message'];
      }else{
        $status="error";
        $message="Access Denied";
      }
    }
    return redirect()->action('PostController@control', ['status'=>$status, 'message'=>$message]);
  }
}
