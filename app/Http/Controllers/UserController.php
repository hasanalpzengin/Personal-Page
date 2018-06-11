<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\UserModel;


class UserController extends Controller
{
  protected function add(Request $request){
    if ($request->input('status')!==null) {
      $content['status']=$request->input('status');
      $content['message']=$request->input('message');
    }else{
      if ($request->session()->get('id')!==null) {
        $content=UserModel::addUser($request->username, $request->password, $request->mail, $request->name, $request->permission);
      }else{
        $content['status']="error";
        $content['message']="Access Denied";
      }
    }
    return view('admin/user/add', compact('content'));
  }
  protected function control(Request $request){
    if ($request->status!==null) {
      $content['status']=$request->status;
      $content['message']=$request->message;
    }
    if ($request->session()->get('id')!==null) {
      $result = UserModel::getUsers();
      if (isset($result['status'])) {
        $content['status'] = $result['status'];
        $content['message'] = $result['message'];
      }
      $content['list'] = $result['list'];
    }else{
      $content['status']="error";
      $content['message']="Access Denied";
    }
    return view('admin/user/main', compact('content'));
  }
  protected function add_view(Request $request){
    if ($request->input('status')!==null) {
      $content['status']=$request->input('status');
      $content['message']=$request->input('message');
    }
    return view('admin/user/add', compact('content'));
  }
  protected function edit_view(Request $request, $id){
    if ($request->input('status')!==null) {
      $content['status'] = $request->input('status');
      $content['message'] = $request->input('message');
    }
    if ($request->session()->get('id')!==null) {
      $content = UserModel::getUser($id);
    }else{
      $content['status']="error";
      $content['message']="Access Denied";
    }
    return view('admin/user/edit', compact('content'));
  }
  protected function edit(Request $request){
    if ($request->input('status')!==null) {
      $status=$request->input('status');
      $message=$request->input('message');
    }else{
      if ($request->session()->get('id')!==null) {
        $result=UserModel::editUser($request->id, $request->username, $request->password, $request->mail, $request->name, $request->permission);
        $status = $result['status'];
        $message = $result['message'];
      }else{
        $status="error";
        $message="Access Denied";
      }
    }
    return redirect()->action('UserController@control', ['status'=>$status, 'message'=>$message]);
  }
  protected function delete(Request $request, $id){
    if ($request->input('status')!==null) {
      $status="error";
      $message="Access Denied";
    }else{
      if ($request->session()->get('id')!==null) {
        $result=UserModel::deleteUser($id);
        $status = $result['status'];
        $message = $result['message'];
      }else{
        $status="error";
        $message="Access Denied";
      }
    }
    return redirect()->action('UserController@control', ['status'=>$status, 'message'=>$message]);
  }
}
