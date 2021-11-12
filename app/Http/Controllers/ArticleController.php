<?php

namespace App\Http\Controllers;

use App\Article;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::when(isset(request()->search),function ($q){
            $search=request()->search;
          $q->where("title","like","%$search%")->orWhere("description","like","%$search%");
        })->latest("id")->paginate(7);
        return view('Article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "category"=>'required|exists:categories,id',
            "photo" =>'required',
            "title"=>'required|min:2|max:200',
            'description'=>"required|min:5"
        ]);
        $dir="article_store";
        $file=$request->file('photo');
        $file_name=uniqid()."_article".$file->getClientOriginalName();
        $file->move($dir,$file_name);




        $article=new Article();
        $article->title=$request->title;
        $article->photo=$file_name;
        $article->description=$request->description;
        $article->user_id=$request->user_id;
        $article->category_id=$request->category;

        $article->save();
        return back()->with('success' , $article->title ." is success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article,$id)
    {
        $articles=Article::find($id);

        return view('Article.show',compact('articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article ,$id)
    {
       $articles=Article::find($id);
        return  view('Article.edit',compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article,$id)
    {
        $request->validate([
            "category"=>'required|exists:categories,id',
            "photo"=>'require',
            "title"=>'required|min:2|max:200',
            'description'=>"required|min:5"
        ]);

        $articles=Article::find($id);


        $articles->title=$request->title;
        $articles->description=$request->description;
        $articles->category_id=$request->category;
        $articles->update();


        return  redirect()->route('Article.index')->with('message','success editing');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article ,$id)
    {
       $articles=Article::find($id);
       $articles->delete();
        return back()->with('del_message',$articles->title. " is deleted");
    }
}
