<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Log;

class LogsController extends Controller
{
    public function list(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>5){
                $logs = Log::all();
                return view('pages.logs', ['logs'=>$logs]);
            }
            return view('pages.error', ['error'=>'Permission not granted']);
        }
        return view('pages.error', ['error'=>'You have to be logged to access that page']);
    }

}
