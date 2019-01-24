<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Category;
use App\Skill;
use App\Log;

class SkillsController extends Controller
{
    public function show(){
        $skills = Skill::all();
        $categories = Category::all();
        return view('pages.skills', ['skills'=>$skills, 'categories'=>$categories]);
    }

    public function showNew(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>5){
                $categories = Category::all();
                return view('pages.skills.new',['categories'=>$categories]);
            }
            return view('pages.error', ['error'=>'Permission not granted']);
        }
        return view('pages.error', ['error'=>'You have to be logined to access that page']);
    }

    public function create(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>5){
                $skill = new Skill;
                $skill->category = $request->category;
                $skill->name = $request->name;
                $skill->save();
                //create log
                $log = new Log;
                $log->uid = $request->session()->get('id');
                $log->log = $request->name." Skill Created";
                $log->save();
                return Redirect::back();
            }
            return view('pages.error', ['error'=>'Permission not granted']);
        }
        return view('pages.error', ['error'=>'You have to be logged to access that page']);
    }

    public function delete(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>5){
                Skill::where('name', $request->name)->delete();
                //create log
                $log = new Log;
                $log->uid = $request->session()->get('id');
                $log->log = $request->name." Skill Deleted";
                $log->save();
                return redirect('/skills');
            }
        }
    }
}
