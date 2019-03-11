<?php

namespace App\Http\Controllers;

use Request;
use Storage;
use Validator;
use App\User;
use App\Article;
use App\Category;
use Auth;

class StaticController extends Controller
{
    public function articles()
    {
        $article = Article::all();
        $categories  = Category::all();
    	$user = User::all();
       
        return view("welcome")
            ->with("categories", $categories)
            ->with("articles", $article);
        
    }
    public function fulltext()
    {
        $article = Article::all();
        $categories  = Category::all();
        return view("welcomefull")
           ->with("categories", $categories)
           ->with("articles", $article);
    }
}
