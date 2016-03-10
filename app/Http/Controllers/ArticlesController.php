<?php

namespace App\Http\Controllers;



use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use App\Tag;
use DB;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class ArticlesController extends Controller
{
    public function __construct(){

        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    public function index(){

	    $articles = Article::latest('publish_at')->published()->get();
        $users = $this->getUsersList();
	    return view ('articles.index', compact('articles','users')) ;
    }

    private function getUsersList(){

        return DB::table('users')->lists('name','id');
    }

	public function show($id){

		$article = Article::findOrFail($id);
        $users = $this->getUsersList();

		return view ('articles.show', compact('article','users')) ;

	}

	public function create(){

        $tags = Tag::lists('name', 'id');

		return view('articles.create', compact('tags'));
	}

	public function store(ArticleRequest $request){

        $article = Auth::user()->articles()->create($request->all());

        $article->tags()->sync($request->input('tag_list'));


		return redirect('articles');

	}

	public function edit($id){

		$article = Article::findOrFail($id);
        $tags = Tag::lists('name', 'id');

		return view('articles.edit', compact('article','tags'));
	}

	public function update($id, ArticleRequest $request){

		$article = Article::findOrFail($id);

        $article->user_id = Auth::user()->id;
		$article->update($request->all());

        $article->tags()->sync($request->input('tag_list'));



		return redirect('articles');

	}

}
