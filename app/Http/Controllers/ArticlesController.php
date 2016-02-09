<?php

namespace App\Http\Controllers;



use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Request;


class ArticlesController extends Controller
{
    public function index(){

	    $articles = Article::latest()->get();
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

	public function store(Requests\CreateArticleRequest $request){

		$input = $request->all();

		$input['publish_at'] = Carbon::now();

		Article::create($input);

		return redirect('articles');

	}
}
