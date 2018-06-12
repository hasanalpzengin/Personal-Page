<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\ProjectModel;


class ProjectController extends Controller
{
  protected function add(Request $request){
    if ($request->input('status')!==null) {
      $content['status']=$request->input('status');
      $content['message']=$request->input('message');
    }else{
      if ($request->session()->get('id')!==null) {
        $content=ProjectModel::addProject($request->name, $request->text, $request->link);
      }else{
        $content['status']="error";
        $content['message']="Access Denied";
      }
    }
    return view('admin/project/add', compact('content'));
  }
  protected function control(Request $request){
    if ($request->status!==null) {
      $content['status']=$request->status;
      $content['message']=$request->message;
    }
    if ($request->session()->get('id')!==null) {
      $result = ProjectModel::getProjects();
      if (isset($result['status'])) {
        $content['status'] = $result['status'];
        $content['message'] = $result['message'];
      }
      $content['list'] = $result['list'];
    }else{
      $content['status']="error";
      $content['message']="Access Denied";
    }
    return view('admin/project/main', compact('content'));
  }
  protected function add_view(Request $request){
    if ($request->input('status')!==null) {
      $content['status']=$request->input('status');
      $content['message']=$request->input('message');
    }
    return view('admin/project/add', compact('content'));
  }
  protected function edit_view(Request $request, $id){
    if ($request->input('status')!==null) {
      $content['status'] = $request->input('status');
      $content['message'] = $request->input('message');
    }
    if ($request->session()->get('id')!==null) {
      $content = ProjectModel::getProject($id);
    }else{
      $content['status']="error";
      $content['message']="Access Denied";
    }
    return view('admin/project/edit', compact('content'));
  }
  protected function edit(Request $request){
    if ($request->input('status')!==null) {
      $status=$request->input('status');
      $message=$request->input('message');
    }else{
      if ($request->session()->get('id')!==null) {
        $result=ProjectModel::editProject($request->id, $request->name, $request->text, $request->link);
        $status = $result['status'];
        $message = $result['message'];
      }else{
        $status="error";
        $message="Access Denied";
      }
    }
    return redirect()->action('ProjectController@control', ['status'=>$status, 'message'=>$message]);
  }
  protected function delete(Request $request, $id){
    if ($request->input('status')!==null) {
      $status="error";
      $message="Access Denied";
    }else{
      if ($request->session()->get('id')!==null) {
        $result=ProjectModel::deleteProject($id);
        $status = $result['status'];
        $message = $result['message'];
      }else{
        $status="error";
        $message="Access Denied";
      }
    }
    return redirect()->action('ProjectController@control', ['status'=>$status, 'message'=>$message]);
  }
}
