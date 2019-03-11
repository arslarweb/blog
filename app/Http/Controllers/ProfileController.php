<?php

namespace App\Http\Controllers;

use Request;
use Storage;
use Validator;
use App\User;
use App\Article;
use App\Category;
use Auth;

class ProfileController extends Controller
{
    public function index($slug)
    {
        $articles = Article::all();
        $categories  = Category::all();
    	$user = Auth::user();
        if($user->role == 1){
            return view("admin/adminindex")
            ->with("categories", $categories)
            ->with("articles", $articles);
        }else{
            return view("profile/index");
        }
    }

    public function changephoto($id)
    {
    	$user = user::find($id);
 	   	return view("profile.pic")
 	   	 	->with("users", $user);;
 	   	
    }

    public function uploadPhoto()
    {
    	//$file = Request::file('pic');
    	//echo $filename = $file->getClientOriginalName();
    	
    	$input = Request::all();
    	
        $user = user::find($input["id"]);

    	$filename = time() . '.' . Request::file('pic')->getClientOriginalExtension();
        Request::file('pic')->move(public_path('img/'), $filename);
        $input["pic"] = $filename;
        
        $user->update($input);
    	return redirect('/profile/index');
    }
}
