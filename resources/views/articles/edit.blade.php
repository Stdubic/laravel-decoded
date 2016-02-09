
<h1>Edit Article</h1>


{!! Form::model($articles, ['method' =>  'PATCH', 'action' => ['ArticlesController@update', $articles->id]]) !!}

<div class="form-group">
    {!! Form::label('title',  'Name :') !!}
    {!! Form::text('title', null, ['class' => 'form-control'] ) !!}
</div>

<div class="form-group">
    {!! Form::label('body',  'Body :') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control'] ) !!}
</div>

<div class="form-group">
    {!! Form::submit('Add Article', ['class' => 'form-control'] ) !!}
</div>


{!! Form::close() !!}



@if ($errors->any())

       <ul class="alert-danger">
            @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

            @endforeach
       </ul>
@endif


