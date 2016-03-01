<div class="form-group">
    {!! Form::label('title',  'Name :') !!}
    {!! Form::text('title', null, ['class' => 'form-control'] ) !!}
</div>

<div class="form-group">
    {!! Form::label('body',  'Body :') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control'] ) !!}
</div>

<div class="form-group">
    {!! Form::label('publish_at',  'Pubilish on:') !!}
    {!! Form::input('date', 'publish_at', date('Y-m-d') ,['class' => 'form-control'] ) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'form-control'] ) !!}
</div>
