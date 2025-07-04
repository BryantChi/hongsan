<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $translationsInfo->id }}</p>
</div>

<!-- Key Field -->
<div class="col-sm-12">
    {!! Form::label('key', 'Key:') !!}
    <p>{{ $translationsInfo->key }}</p>
</div>

<!-- Translations Field -->
<div class="col-sm-12">
    {!! Form::label('translations', 'Translations:') !!}
    <p>{{ $translationsInfo->translations }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $translationsInfo->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $translationsInfo->updated_at }}</p>
</div>

