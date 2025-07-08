<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', '名稱:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', '連結:') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Sort Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sort_order', '排序:') !!}
    {!! Form::number('sort_order', $nextSortOrder ?? null, ['class' => 'form-control', 'min' => 0]) !!}
</div>
<div class="clearfix w-100"></div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', '圖片:') !!}
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
        <label class="custom-file-label" for="image">Choose file</label>
    </div>
    <div class="img-preview-cover mt-2">
        @if ($caseInfo->image ?? null)
            <p for="">預覽</p>
            <img src="{{ asset('uploads/' . $caseInfo->image) ?? url('') . '/uploads/' . $caseInfo->image }}"
                style="max-width: 200px; max-height: 200px;">
        @endif
    </div>
</div>
<div class="clearfix w-100"></div>



<!-- 'bootstrap / Toggle Switch Status Field' -->
<div class="form-group col-sm-6">
    <div class="custom-control custom-switch">
        {!! Form::checkbox('status', 1, true,  ['class' => 'custom-control-input', 'id' => 'status']) !!}
        {!! Form::label('status', '狀態', ['class' => 'custom-control-label']) !!}
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
