<!-- Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('link', '連結:') !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
</div>
<div class="clearfix w-100"></div>

<!-- Sort Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sort_order', '排序:') !!}
    {!! Form::number('sort_order', $nextSortOrder ?? null, ['class' => 'form-control', 'min' => 0]) !!}
</div>
<div class="clearfix w-100"></div>

<!-- 'bootstrap / Toggle Switch Operating Converter Field' -->
<div class="form-group col-sm-6">
    <div class="custom-control custom-switch">
        {!! Form::checkbox('status', 1, true,  ['class' => 'custom-control-input', 'id' => 'status']) !!}
        {!! Form::label('status', '狀態', ['class' => 'custom-control-label']) !!}
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
                <div class="form-group col-sm-6 mt-3">
                    {!! Form::label($locale.'[title]', '名稱:') !!}
                    {!! Form::text($locale.'[title]', isset($heroSlide) ? $heroSlide->translateOrNew($locale)->title : null, ['class' => 'form-control', 'required' => $loop->first]) !!}
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-sm-6 mt-3">
                    <!-- Image 624 Field -->
                    {!! Form::label($locale.'[image_624]', '圖片 624x560:') !!}
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="{{ $locale }}_image_624" name="{{ $locale }}[image_624]" accept="image/*">
                        <label class="custom-file-label" for="{{ $locale }}_image_624">Choose file</label>
                    </div>
                    <div class="img-preview-{{ $locale }}-624 mt-2">
                        @if (isset($heroSlide) && $heroSlide->translateOrNew($locale)->image_624)
                            <p for="">預覽</p>
                            <img src="{{ url('') . '/uploads/' . $heroSlide->translateOrNew($locale)->image_624 }}"
                                style="max-width: 200px; max-height: 200px;">
                        @endif
                    </div>
                </div>
                <div class="clearfix"></div>
                <!-- Image 1024 Field -->
                <div class="form-group col-sm-6 mt-3">
                    {!! Form::label($locale.'[image_1024]', '圖片 1024x624:') !!}
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="{{ $locale }}_image_1024" name="{{ $locale }}[image_1024]" accept="image/*">
                        <label class="custom-file-label" for="{{ $locale }}_image_1024">Choose file</label>
                    </div>
                    <div class="img-preview-{{ $locale }}-1024 mt-2">
                        @if (isset($heroSlide) && $heroSlide->translateOrNew($locale)->image_1024)
                            <p for="">預覽</p>
                            <img src="{{ url('') . '/uploads/' . $heroSlide->translateOrNew($locale)->image_1024 }}"
                                style="max-width: 200px; max-height: 200px;">
                        @endif
                    </div>
                </div>
                <div class="clearfix"></div>
                <!-- Image 1280 Field -->
                <div class="form-group col-sm-6 mt-3">
                    {!! Form::label($locale.'[image_1280]', '圖片 1280x560:') !!}
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="{{ $locale }}_image_1280" name="{{ $locale }}[image_1280]" accept="image/*">
                        <label class="custom-file-label" for="{{ $locale }}_image_1280">Choose file</label>
                    </div>
                    <div class="img-preview-{{ $locale }}-1280 mt-2">
                        @if (isset($heroSlide) && $heroSlide->translateOrNew($locale)->image_1280)
                            <p for="">預覽</p>
                            <img src="{{ url('') . '/uploads/' . $heroSlide->translateOrNew($locale)->image_1280 }}"
                                style="max-width: 200px; max-height: 200px;">
                        @endif
                    </div>
                </div>
                <div class="clearfix"></div>
                <!-- Image 1920 Field -->
                <div class="form-group col-sm-6 mt-3">
                    {!! Form::label($locale.'[image_1920]', '圖片 1920x480:') !!}
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="{{ $locale }}_image_1920" name="{{ $locale }}[image_1920]" accept="image/*">
                        <label class="custom-file-label" for="{{ $locale }}_image_1920">Choose file</label>
                    </div>
                    <div class="img-preview-{{ $locale }}-1920 mt-2">
                        @if (isset($heroSlide) && $heroSlide->translateOrNew($locale)->image_1920)
                            <p for="">預覽</p>
                            <img src="{{ url('') . '/uploads/' . $heroSlide->translateOrNew($locale)->image_1920 }}"
                                style="max-width: 200px; max-height: 200px;">
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@push('page_scripts')
<script>
    $(document).ready(function() {
        // 多語系欄位的圖片預覽功能
        $(document).on('change', '[id$="_image_624"], [id$="_image_1024"], [id$="_image_1280"], [id$="_image_1920"]', function () {
            let fileInput = this;

            // 檢查是否有選擇檔案
            if (!fileInput.files || !fileInput.files[0]) {
                console.log('沒有選擇檔案');
                return;
            }

            // 取得完整 ID 並記錄
            let fullId = fileInput.id;
            console.log('完整 ID:', fullId);

            // 從完整 ID 中提取語系和尺寸資訊
            let sizeMatch = fullId.match(/_image_(\d+)$/);
            if (!sizeMatch) {
                console.error('無法從 ID 提取尺寸:', fullId);
                return;
            }

            let size = sizeMatch[1];
            // 語系是 ID 開頭到 "_image_" 之前的部分
            let locale = fullId.substring(0, fullId.indexOf('_image_'));

            console.log('解析結果 - 語系:', locale, '尺寸:', size);

            let previewClass = '.img-preview-' + locale + '-' + size;
            console.log('預覽容器選擇器:', previewClass, '檔案:', fileInput.files[0].name);

            let fileReader = new FileReader();
            fileReader.onload = function(e) {
                let previewHtml = `<p for="">預覽</p><img src="${e.target.result}" style="max-width: 200px; max-height: 200px;">`;

                // 直接使用選擇器尋找預覽容器
                let previewContainer = $(previewClass);

                if (previewContainer.length) {
                    previewContainer.html(previewHtml);
                    console.log('成功更新預覽容器:', previewClass);
                } else {
                    console.error('找不到預覽容器:', previewClass);
                    // 顯示 DOM 中所有可能的預覽容器類別以便診斷
                    console.log('頁面中的所有預覽容器:', $('[class*="img-preview-"]').map(function() {
                        return '.' + $(this).attr('class').replace(/\s+/g, '.');
                    }).get());
                }
            };

            try {
                fileReader.readAsDataURL(fileInput.files[0]);
            } catch (error) {
                console.error('讀取檔案失敗:', error);
            }
        });

        // 顯示選擇的檔案名稱
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').html(fileName || 'Choose file');
        });
    });
</script>
@endpush
