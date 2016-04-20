@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h1>Edit Article</h1>


                    {!! Form::model($article, ['method' =>  'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}

                        @include('articles.form',['submitButtonText' => 'Edit Article'])

                    {!! Form::close() !!}
                    @include('errors.list')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection





