@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>


                <div class="panel-body">
                    <h1>Bid Article </h1>



        <h2>{{$test[0]}}</h2>



                    {!! Form::model($article, ['method' =>  'PATCH', 'action' => ['BidController@update', $article->id]]) !!}

                        @include('articles.bid-form',['submitButtonText' => 'Edit Article'])

                    {!! Form::close() !!}
                    @include('errors.list')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection





