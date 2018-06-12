<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\ResumeModel;
use Illuminate\Http\UploadedFile;

class ResumeController extends Controller
{
  protected function add(Request $request){
    if ($request->input('status')!==null) {
      $content['status']=$request->input('status');
      $content['message']=$request->input('message');
    }
    if ($request->session()->get('id')!==null) {
      $file = $request->file('resume');
      $filename = $file->getClientOriginalName();
      $file->move('storage', $filename);
      ResumeModel::deleteResume();
      $content = ResumeModel::addResume($filename);
    }else{
      $content['status']="error";
      $content['message']="Access Denied";
    }
    return view('admin/resume/add', compact('content'));
  }
  protected function control(Request $request){
    if ($request->status!==null) {
      $content['status']=$request->status;
      $content['message']=$request->message;
    }
    if ($request->session()->get('id')!==null) {
      $result = ResumeModel::getResume();
      if (isset($result['status'])) {
        $content['status'] = $result['status'];
        $content['message'] = $result['message'];
      }
      $content[0] = $result[0];
    }else{
      $content['status']="error";
      $content['message']="Access Denied";
    }
    return view('admin/resume/main', compact('content'));
  }
  protected function add_view(Request $request){
    if ($request->input('status')!==null) {
      $content['status']=$request->input('status');
      $content['message']=$request->input('message');
    }
    return view('admin/resume/add', compact('content'));
  }
}
