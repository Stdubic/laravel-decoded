<?php

namespace App\Http\Controllers;



use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class ArticlesController extends Controller
{
    public function index(){

	    $articles = Article::all();
	    return view ('articles.index', compact('articles')) ;
    }

	public function show($id){

		$articles = Article::findOrFail($id);
		//dd($article);
		return view ('articles.show', compact('articles')) ;

	}

	public function create(){

		return view('articles.create');
	}
}
