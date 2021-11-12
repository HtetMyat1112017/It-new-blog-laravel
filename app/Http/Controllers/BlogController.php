<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $article=Article::when(isset( request()->search),function ($q){
            $search=request()->search;
            $q->where("title","like","%$search%")->orWhere("description","like","%$search%");
        })->with(['user','category'])->latest("id")->paginate(10);

        return view('Blog.index',compact('article'));
    }

    public function detail($id){
       $article=Article::find($id);
       $relate=Article::where("id","!=",$article->id)->orWhere('id','=',$article->category->id)->take(2)->latest()->get();

       return view('Blog.show',compact('article','relate'));
    }

    public function baseOnCategory($id){
        $article=Article::when(isset( request()->search),function ($q){
            $search=request()->search;
            $q->where("title","like","%$search%")->orWhere("description","like","%$search%");
        })->where("category_id",$id)->with(['user','category'])->latest("id")->paginate(10);
        return view('Blog.index',compact('article'));

    }

}
