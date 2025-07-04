<!-- Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('key', 'Key:') !!}
     {{-- 編輯模式下只能讀取 --}}
    @if(isset($translationsInfo) && $translationsInfo->exists)
        {!! Form::text('key', null, ['class' => 'form-control', 'placeholder' => 'Key(小寫英文不含數字、特別符號)', 'readonly']) !!}
        <small class="text-muted w-100 d-block">※編輯模式下只能讀取</small>
    @else
        {!! Form::text('key', null, ['class' => 'form-control', 'placeholder' => 'Key(小寫英文不含數字、特別符號)']) !!}
    @endif
    <small class="text-danger w-100 d-block">※Key(不可重複，使用小寫英文不含數字、特別符號、空格、連字號，可以包含底線)</small>
</div>

<div class="clearfix w-100"></div>

<!-- Translations(en) \ Translations(zh_TW) Text Field name="translations[en]" name="translations[zh_TW]" -->
@foreach(config('translatable.locales', []) as $locale)
    <div class="form-group col-sm-6">
        {!! Form::label("translations[$locale]", (strtoupper($locale) === 'ZH_TW' ? '中文' : 'English') . ' Translation:') !!}
        {!! Form::textarea("translations[$locale]", null, ['class' => 'form-control', 'placeholder' => $locale === 'zh_TW' ? '中文' : 'English', 'rows' => '5']) !!}
    </div>
    <div class="clearfix w-100"></div>
@endforeach

<!-- Note Field -->
<div class="form-group col-sm-12">
    {!! Form::label('note', '備註:') !!}
    {!! Form::textarea('note', null, ['class' => 'form-control', 'placeholder' => '備註', 'rows' => '5']) !!}
</div>

