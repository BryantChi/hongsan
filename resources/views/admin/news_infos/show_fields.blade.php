<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $newsInfo->id }}</p>
</div>

<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $newsInfo->title }}</p>
</div>

<!-- Content Field -->
<div class="col-sm-12">
    {!! Form::label('content', 'Content:') !!}
    <p>{{ $newsInfo->content }}</p>
</div>

<!-- Cover Front Image Field -->
<div class="col-sm-12">
    {!! Form::label('cover_front_image', 'Cover Front Image:') !!}
    <p>{{ $newsInfo->cover_front_image }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $newsInfo->status }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $newsInfo->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $newsInfo->updated_at }}</p>
</div>

