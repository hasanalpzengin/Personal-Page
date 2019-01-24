<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Category;
use App\Log;

class CategoriesController extends Controller
{
    public function showNew(Request $request){
        //permission check
        if($request->session()->get('id')){
            if($request->session()->get('permission')>5){
                return view('pages.newCategory');
            }
            return view('pages.error', ['error'=>'Permission not granted']);
        }
        return view('pages.error', ['error'=>'You have to be logged to access that page']);
    }

    public function create(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>5){
                $category = new Category;
                $category->name = $request->name;
                $category->save();
                //create log
                $log = new Log;
                $log->uid = $request->session()->get('id');
                $log->log = $request->name." Category Updated";
                $log->save();
                return Redirect::back();
            }
            return view('pages.error', ['error'=>'Permission not granted']);
        }
        return view('pages.error', ['error'=>'You have to be logged to access that page']);
    }
}
