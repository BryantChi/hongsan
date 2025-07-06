<!-- Name Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Slug Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Application Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('application_categories_info_id', '應用類別:', ['class' => 'control-label font-weight-bold']) !!}
    {!! Form::select('application_categories_info_id', $applicationCategoriesInfos, isset($brandsInfo) ? $brandsInfo->application_categories_info_id : null, ['class' => 'form-control', 'placeholder' => '請選擇', 'required' => true]) !!}
    {{-- <small>※請選擇應用類別</small> --}}
</div>

<!-- 多語系欄位 -->
<div class="col-sm-12">
    <ul class="nav nav-tabs" id="languageTabs" role="tablist">
        @foreach($locales as $locale)
            <li class="nav-item">
                <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ $locale }}-tab" data-toggle="tab" href="#{{ $locale }}" role="tab" aria-controls="{{ $locale }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                    {{ strtoupper($locale) === 'ZH_TW' ? '中文' : 'English' }} 語系
                </a>
            </li>
        @endforeach
    </ul>

    <div class="tab-content" id="languageTabsContent">
        @foreach($locales as $locale)
            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $locale }}" role="tabpanel" aria-labelledby="{{ $locale }}-tab">
                <div class="form-group col-sm-12 mt-3">
                    {!! Form::label($locale.'[name]', '名稱:') !!}
                    {!! Form::text($locale.'[name]', isset($brandsInfo) ? $brandsInfo->translateOrNew($locale)->name : null, ['class' => 'form-control', 'required' => $loop->first]) !!}
                </div>
            </div>
        @endforeach
    </div>
</div>
