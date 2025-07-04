<!-- 多語系 Title 和 Content 欄位 -->
@foreach($locales as $locale)
    <div class="card mb-3">
        <div class="card-header">
            <h5>{{ strtoupper($locale) === 'ZH_TW' ? '中文' : 'English' }} 語系內容</h5>
        </div>
        <div class="card-body">
            <!-- Title Field -->
            <div class="form-group col-sm-12">
                {!! Form::label($locale.'[title]', '標題 (' . strtoupper($locale) . '):') !!}
                {!! Form::text($locale.'[title]',
                    isset($newsInfo) ? $newsInfo->translate($locale)?->title : null,
                    ['class' => 'form-control', 'required' => true]) !!}
            </div>

            <!-- Content Field -->
            <div class="form-group col-sm-12">
                {!! Form::label($locale.'[content]', '內容 (' . strtoupper($locale) . '):') !!}
                {!! Form::textarea($locale.'[content]',
                    isset($newsInfo) ? $newsInfo->translate($locale)?->content : null,
                    ['class' => 'form-control tinymce-editor tinymce-editor-contents', 'id' => 'contents_'.$locale]) !!}
            </div>
        </div>
    </div>
@endforeach

<!-- Cover Front Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cover_front_image', '封面:') !!}
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="cover_front_image" name="cover_front_image" accept="image/*">
        <label class="custom-file-label" for="cover_front_image">Choose file</label>
    </div>
    <div class="img-preview-cover mt-2">
        @if (isset($newsInfo) && $newsInfo->cover_front_image)
            <p>預覽</p>
            <img src="{{ url('') . '/uploads/' . $newsInfo->cover_front_image }}"
                style="max-width: 200px; max-height: 200px;">
        @endif
    </div>
</div>
<div class="clearfix"></div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', '狀態:') !!}
    <select name="status" id="status" class="form-control">
        <option value="" disabled>請選擇</option>
        <option value="1" {{ (isset($newsInfo) && $newsInfo->status == 1) || (!isset($newsInfo) || $newsInfo->status === null)  ? 'selected' : '' }}>啟用</option>
        <option value="0" {{ isset($newsInfo) && $newsInfo->status == 0 ? 'selected' : '' }}>停用</option>
    </select>
</div>

@push('third_party_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js"
        integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{!! asset('vendor/tinymce/js/tinymce/tinymce.js') !!}"></script>
@endpush

@push('page_scripts')
<script src="{{ asset('assets/admin/js/news.js') }}" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        // 初始化所有語系的 TinyMCE 編輯器
        // @foreach($locales as $locale)
        //     tinymce.init({
        //         selector: '#content_{{ $locale }}',
        //         height: 300,
        //         menubar: false,
        //         plugins: [
        //             'advlist autolink lists link image charmap print preview anchor',
        //             'searchreplace visualblocks code fullscreen',
        //             'insertdatetime media table paste code help wordcount'
        //         ],
        //         toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        //         content_css: '//www.tiny.cloud/css/codepen.min.css'
        //     });
        // @endforeach

        // 圖片預覽功能
        $(document).on('change', '#cover_front_image', function () {
            let fileInput = this;
            let fileReader = new FileReader();

            fileReader.onload = function(e) {
                let previewHtml = `<p>預覽</p><img src="${e.target.result}" style="max-width: 200px; max-height: 200px;">`;
                $(fileInput).closest('.form-group').find('.img-preview-cover').html(previewHtml);
            };

            if (fileInput.files && fileInput.files[0]) {
                fileReader.readAsDataURL(fileInput.files[0]);
            }
        });

        // 更新檔案標籤
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).siblings('.custom-file-label').addClass('selected').html(fileName);
        });
    });
</script>
@endpush
