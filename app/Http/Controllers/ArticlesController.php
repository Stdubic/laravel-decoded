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

	    $articles = Article::latest('publish_at')->published()->get();
	    return view ('articles.index', compact('articles')) ;
    }

	public function show($id){

		$article = Article::findOrFail($id);
		//dd($article);
		return view ('articles.show', compact('article')) ;

	}

	public function create(){

		return view('articles.create');
	}

	public function store(Requests\ArticleRequest $request){

        Article::create( $request->all() );

		return redirect('articles');

	}

	public function edit($id){

		$articles = Article::findOrFail($id);
		return view('articles.edit', compact('articles'));
	}

	public function update($id, Requests\ArticleRequest $request){

		$articles = Article::findOrFail($id);

		$articles->update($request->all());

		return redirect('articles');


	}

}
