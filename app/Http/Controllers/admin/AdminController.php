<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Request;
use Storage;
use Validator;
use App\User;
use App\Article;
use App\Category;
use Auth;

class AdminController extends Controller
{
	//$articles = Article::all();
       // return $input;

    //dd($articles);
    public function add()
    {
        $categories = Category::all();
        $users = User::all();
       	return view('admin/addarticle')
       		->with("users",$users)
       		->with("categories",$categories);
    }
    public function save()
    {
        $input = Request::all();

        $validator=Validator::make($input,[
            //'user_id'=>'required',
            'title'=>'required',
            'category_id'=>'required',
            'image'=>'required',
            'short_text'=>'required|string',
            'full_text'=>'required|string',
            
        ],[]);
        
       $errors = $validator->errors();
        if($validator->fails()){
           return redirect()->back()->withErrors($errors)->with('input',$input);
        }
        if(Request::file('image')){
            $filename = time() . '.' . Request::file('image')->getClientOriginalExtension();
            Request::file('image')->move(public_path('img/articles/'), $filename);
            $input["image"] = $filename;
        }

        Article::create($input);


    	/*$title = Request::input("title");
    	$text = Request::input("text");
    	$author = Request::input("author");
    	$date = Request::input("date");
    	$time = Request::input("time");

    	$novosti = new novosti;
    		$novosti->title =$title;
    		$novosti->text =$text;
    		$novosti->author = $author;
    		$novosti->date = $date;
    		$novosti->time = $time;
    	$novosti->save();
        */
    	return redirect('/profile/{{ Auth::user()->name }}');
    }
}
