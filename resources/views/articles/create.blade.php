<h1>New Article</h1>

{!! Form::open(['url' => 'articles']) !!}

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


