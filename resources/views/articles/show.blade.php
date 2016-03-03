@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <article>
                    <h2>
                    {{$article->title}}
                    </h2>

                    <div class="body">{{$article->body}}</div>

                    </article>
                    @unless($article->tags->isEmpty())
                    <h5>Tags:</h5>
                    <ul>
                            @foreach($article->tags as $tag)

                            <li>{{$tag->name}}</li>

                            @endforeach
                    </ul>
                    @endunless
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



