<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ->with('articles, \app\Article::all())
        return view('home')->withArticles(Article::all());
    }
}
