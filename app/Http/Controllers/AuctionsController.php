<?php

namespace App\Http\Controllers;



use App\Auction;
use App\Http\Requests;
use App\Http\Requests\AuctionRequest;
use App\Http\Controllers\Controller;
use App\Tag;
use DB;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class AuctionsController extends Controller
{
    /**
     *
     */
    public function __construct(){

        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    public function index(){

        $articles = Auction::latest('publish_at')->published()->get();
        $users = $this->getUsersList();
        return view ('auctions.index', compact('articles','users')) ;
    }

    /**
     * @return mixed
     */
    private function getUsersList(){

        return DB::table('users')->lists('name','id');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){

        $article = Auction::findOrFail($id);
        $users = $this->getUsersList();

        return view ('auctions.show', compact('article','users')) ;

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){

        $tags = Tag::lists('name', 'id');

        return view('auctions.create', compact('tags'));
    }

    /**
     * @param ArticleRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(AuctionRequest $request){

        $article = Auth::user()->articles()->create($request->all());

        $article->tags()->sync($request->input('tag_list'));


        return redirect('auctions');

    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){

        $article = Auction::findOrFail($id);
        $tags = Tag::lists('name', 'id');

        return view('auctions.edit', compact('article','tags'));
    }

    /**
     * @param $id
     * @param ArticleRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, AuctionRequest $request){

        $article = Auction::findOrFail($id);

        $article->user_id = Auth::user()->id;
        $article->update($request->all());

        $article->tags()->sync($request->input('tag_list'));



        return redirect('auctions');

    }


}
