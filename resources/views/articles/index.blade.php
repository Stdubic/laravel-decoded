@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                    @foreach( $articles as $article )

                    <h2>
                    <a href="{{ url('/articles', $article->id) }}"> {{$article->title}}</a>
                    </h2>
                        <div class="body">{{$article->body}}</div>
                        <div class="body">{{$article->created_at}}</div>

                        <div class="body">{{$users[$article->user_id]}}</div>



                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection