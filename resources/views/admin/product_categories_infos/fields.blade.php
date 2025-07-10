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

<!-- Application Categories Info Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('application_categories_info_id', '應用類別:', ['class' => 'control-label font-weight-bold']) !!}
    {!! Form::select('application_categories_info_id', $applicationCategoriesInfos, isset($productCategoriesInfo) ? $productCategoriesInfo->application_categories_info_id : null, ['class' => 'form-control', 'placeholder' => '請選擇', 'required' => true]) !!}
    {{-- <small>※請選擇應用類別</small> --}}
</div>
<div class="clearfix w-100"></div>

<!-- Icon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('icon', '分類圖示:') !!}
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="icon" name="icon" accept="image/*">
        <label class="custom-file-label icon-label" for="icon">Choose file</label>
    </div>
    <div class="img-preview-icon mt-2">
        @if ($productCategoriesInfo->icon ?? null)
            <p for="">預覽</p>
            <img src="{{ url('') . '/uploads/' . $productCategoriesInfo->icon }}"
                style="max-width: 200px; max-height: 200px;">
        @endif
    </div>
</div>
<div class="clearfix w-100"></div>

<!-- Cover Front Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', '圖片:') !!}
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
        <label class="custom-file-label image-label" for="image">Choose file</label>
    </div>
    <div class="img-preview-cover mt-2">
        @if ($productCategoriesInfo->image ?? null)
            <p for="">預覽</p>
            <img src="{{ url('') . '/uploads/' . $productCategoriesInfo->image }}"
                style="max-width: 200px; max-height: 200px;">
        @endif
    </div>
</div>
<div class="clearfix w-100"></div>

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
                    {!! Form::text($locale.'[name]', isset($productCategoriesInfo) ? $productCategoriesInfo->translateOrNew($locale)->name : null, ['class' => 'form-control', 'required' => $loop->first]) !!}
                </div>
            </div>
        @endforeach
    </div>
</div>

@push('page_scripts')
<script>
    $(document).ready(function() {
        $(document).on('change', '#image', function () {
            let fileInput = this;
            let fileReader = new FileReader();

            fileReader.onload = function(e) {
                let previewHtml = `<p for="">預覽</p><img src="${e.target.result}" style="max-width: 200px; max-height: 200px;">`;
                $(fileInput).closest('.form-group').find('.img-preview-cover').html(previewHtml);
            };

            fileReader.readAsDataURL(fileInput.files[0]);

            // label 更新
            let fileName = fileInput.files[0].name;
            $(fileInput).next('.image-label').html(fileName);
        });
        $(document).on('change', '#icon', function () {
            let fileInput = this;
            let fileReader = new FileReader();

            fileReader.onload = function(e) {
                let previewHtml = `<p for="">預覽</p><img src="${e.target.result}" style="max-width: 200px; max-height: 200px;">`;
                $(fileInput).closest('.form-group').find('.img-preview-icon').html(previewHtml);
            };

            fileReader.readAsDataURL(fileInput.files[0]);

            // label 更新
            let fileName = fileInput.files[0].name;
            $(fileInput).next('.icon-label').html(fileName);
        });
        // $(document).on('change', '[id^="plan_style_"]', function () {
        //     let fileInput = this;
        //     let fileReader = new FileReader();
        //     let id = $(fileInput).attr('id'); // 獲取元素的ID
        //     let previewClass = `.img-preview-s${id.split('_').pop()}`; // 根據ID動態生成對應的預覽class

        //     fileReader.onload = function (e) {
        //         let previewHtml = `<p>預覽</p><img src="${e.target.result}" style="max-width: 200px; max-height: 200px;">`;
        //         $(fileInput).closest('.form-group').find(previewClass).html(previewHtml);
        //     };

        //     fileReader.readAsDataURL(fileInput.files[0]);
        // });
    });
</script>
@endpush
