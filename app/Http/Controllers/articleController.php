<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\category;
use App\Article;
use Auth;
class articleController extends Controller
{
  public function articles()
  {
    $category = Category::all();
      return view('Articles.articles', ['category'=>$category]);
  }
  public function addArticle(Request $request)
  {
     $this->validate($request,[
      'title'=>'required',
      'slug'=>'required',
      'description'=>'required',
      'category_id'=>'required'
     ]);
     $articles= new Article;
     $articles->title=$request->input('title');
     $articles->slug=$request->input('slug');
     $articles->user_id= Auth::user()->id;
     $articles->description=$request->input('description');
     $articles->category_id=$request->input('category_id');
       if(Input::hasFile('article_image')){
         $file=Input::file('article_image');
         $file->move(public_path().'/uploads/',
         $file->getClientOriginalName());
         $url=URL::to("/").'/uploads/'.
           $file->getClientOriginalName();
       }
       $articles->article_image=$url;
     $articles->save();
     return redirect('/articles')->with('response','Article added successffully');

  }

  public function viewArticle($article_id)
  {
    $article=Article::where('id','=',$article_id)->get();
    $category = Category::all(); 
    return view('articles.view',['article'=> $article, 'category'=>$category]);
  }
  public function editArticle($article_id)
  {
    $category = Category::all(); 
    $article=Article::find($article_id);
    $category=Category::find($article->category_id);
    return view('articles.edit',['category'=>$category,'article'=>$article,'category'=>$category]);
  }
  public function editArticlePart(Request $request ,$article_id)
  {
    $this->validate($request,[
      'title'=>'required',
      'slug'=>'required',
      'description'=>'required',
      'category_id'=>'required'
     ]);
     $articles= new Article;
     $articles->title=$request->input('title');
     $articles->slug=$request->input('slug');
     $articles->user_id= Auth::user()->id;
     $articles->description=$request->input('description');
     $articles->category_id=$request->input('category_id');
       if(Input::hasFile('article_image')){
         $file=Input::file('article_image');
         $file->move(public_path().'/uploads/',
         $file->getClientOriginalName());
         $url=URL::to("/").'/uploads/'.
           $file->getClientOriginalName();
       }
       $articles->article_image=$url;
       $data=array(
         'title'=>$article->title,
         'description'=>$article->description,
         'user_id'=>$article->tituser_idle,
         'category_id'=>$article->category_id,
         'article_image'=>$article->article_image
       );
       Artcile::where('id',$article_id)
       ->update($data);
     $articles->update();
     return redirect('/articles')->with('response','Article added successffully');
  }
}
