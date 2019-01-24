<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use File;
use App\Log;

class ResumeController extends Controller
{
    public function show(){
        return view('pages.cv');
    }

    public function upload(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>5){
                if($request->file('resume')){
                    //move image
                    File::delete(base_path().'/public/documents/cv.pdf');
                    $request->file('resume')->move(base_path().'/public/documents',"cv.pdf");
                    //create log
                    $log = new Log;
                    $log->uid = $request->session()->get('id');
                    $log->log = "Uploaded New Resume";
                    $log->save();
                    return Redirect::back();
                }
            }else{
                return view('pages.error', ['error'=>"Not enough permission to upload new cv"]);
            }
        }else{
            return view('pages.error', ['error'=>"You have to be logged in to upload new cv"]);
        }
    }

    public function showUpload(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>5){
                return view('pages.uploadResume');
            }else{
                return view('pages.error', ['error'=>"Not enough permission to upload new cv"]);
            }
        }else{
            return view('pages.error', ['error'=>"You have to be logged in to upload new cv"]);
        }
    }
}
