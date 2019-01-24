<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Category;
use App\Comment;
use App\Log;

class BlogsController extends Controller
{

    public function showAll(Request $request){
        if($request->session()->get('permission')>5){
            $blogs = Post::orderBy('created_at','desc')->get();
            return view('pages.blogs', ['blogs'=>$blogs]);
        }
        $blogs = Post::where('isVisible', '=', '1')->orderBy('created_at','desc')->get();
        return view('pages.blogs', ['blogs'=>$blogs]);
    }

    public function showSingle($id){
        $blog = Post::where('posts.id', "=", $id)
            ->join('users', 'users.id', '=', 'posts.author')
            ->join('categories', 'categories.id', "=", 'posts.category')
            ->get(array(
                'posts.id as id',
                'title',
                'text',
                'isVisible',
                'users.id as uid',
                'users.username',
                'posts.created_at',
                'posts.updated_at',
                'image_name',
                'categories.id as cid',
                'categories.name'
            ))->first();

        $comments = Comment::where('comments.topic','=',$id)
        ->join('users', 'users.id', '=', 'comments.owner')
        ->get(array(
            'users.username',
            'users.id as uid',
            'comments.id as id',
            'comments.text',
            'comments.created_at',
        ));
        
        return view('pages.blog', ['blog'=>$blog, 'comments'=>$comments]);
    }


    public function showNew(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>5){
                $categories = Category::all();
                return view('pages.blogs.new', compact('categories'));
            }
            return view('pages.error', ['error'=>'Permission not granted']);
        }
        return view('pages.error', ['error'=>'You have to be logged to access that page']);
    }

    public function showEdit(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>5){
                $post = Post::where('id',$request->id)->first();
                $categories = Category::all();
                return view('pages.blogs.edit', ['categories'=>$categories, 'post'=>$post]);
            }
            return view('pages.error', ['error'=>'Permission not granted']);
        }
        return view('pages.error', ['error'=>'You have to be logged to access that page']);
    }

    public function create(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>5){
                //new post
                $post = new Post;
                if($request->file('image')){
                    $imageName = $request->session()->get('id').
                    "-".
                    md5(uniqid()).
                    ".".
                    $request->file('image')->getClientOriginalExtension();
                    //save image name
                    $post->image_name = $imageName;
                    //move image
                    $request->file('image')->move(base_path().'/public/image/cover_images/',$imageName);
                }
                $post->title = $request->title;
                $post->text = $request->text;
                $post->isVisible = $request->visibility=="on" ? 1 : 0;
                $post->author = $request->session()->get('id');
                $post->category = $request->category;
                $post->save();
                //create log
                $log = new Log;
                $log->uid = $request->session()->get('id');
                $log->log = $request->title." Blog Created";
                $log->save();
                return redirect('/blogs');
            }
            return view('pages.error', ['error'=>'Permission not granted']);
        }
        return view('pages.error', ['error'=>'You have to be logged to access that page']);
    }

    public function update(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>5){
                $post = Post::where('id',$request->id)->first();
                if($request->file('image')){
                    $imageName = $request->session()->get('id').
                    "-".
                    md5(uniqid()).
                    ".".
                    $request->file('image')->getClientOriginalExtension();
                    $post->image_name = $imageName;
                    //save image
                    $request->file('image')->move(base_path().'/public/image/cover_images/',$imageName);
                }
                $post->title = $request->title;
                $post->text = $request->text;
                $post->isVisible = $request->visibility=="on" ? 1 : 0;
                $post->author = $request->session()->get('id');
                $post->category = $request->category;
                $post->save();
                //create log
                $log = new Log;
                $log->uid = $request->session()->get('id');
                $log->log = $request->title." Blog Updated";
                $log->save();
                return Redirect::back();
            }
            return view('pages.error', ['error'=>'Permission not granted']);
        }
        return view('pages.error', ['error'=>'You have to be logged to access that page']);
    }

    public function delete(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>6){
                Post::where('id', $request->id)->delete();
                //create log
                $log = new Log;
                $log->uid = $request->session()->get('id');
                $log->log = $request->title." Blog Deleted";
                $log->save();
                return redirect('/blogs');
            }
        }
    }

    public function comment(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>5){
                $comment = new Comment;
                $comment->owner = $request->session()->get('id');
                $comment->text = $request->text;
                $comment->topic = $request->topic;
                $comment->save();
                //create log
                $log = new Log;
                $log->uid = $request->session()->get('id');
                $log->log = $request->topic." Blog Commented";
                $log->save();
                return Redirect::back();
            }
            return view('pages.error', ['error'=>'Permission not granted']);
        }
        return view('pages.error', ['error'=>'You have to be logged to access that page']);
    }

    public function deleteComment(Request $request){
        if($request->session()->get('id')){
            if($request->session()->get('permission')>5){
                Comment::where('id', $request->id)->delete();
                //create log
                $log = new Log;
                $log->uid = $request->session()->get('id');
                $log->log = $request->id." Comment Deleted";
                $log->save();
                return Redirect::back();
            }
            return view('pages.error', ['error'=>'Permission not granted']);
        }
        return view('pages.error', ['error'=>'You have to be logged to access that page']);
    }
}
