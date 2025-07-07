<!-- Application Categories Info Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('application_categories_info_id', '應用類別:', ['class' => 'control-label', 'style' => 'font-weight:bold !important;']) !!}
    {!! Form::select('application_categories_info_id', $applicationCategoriesInfos, isset($productCategoriesInfo) ? $productCategoriesInfo->application_categories_info_id : null, ['class' => 'form-control', 'id' => 'application_categories_info_id', 'placeholder' => '請選擇', 'required' => true]) !!}
    {{-- <small>※請選擇應用類別</small> --}}
</div>
<div class="clearfix w-100"></div>

<!-- Brands Info Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('brands_info_id', '產品品牌:') !!}
    {!! Form::select('brands_info_id', [], null, ['class' => 'form-control', 'placeholder' => '請先選擇應用類別', 'id' => 'brands_info_id', 'required' => true]) !!}
</div>

<!-- Product Categories Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('product_categories_id', '產品類別:') !!}
    {!! Form::select('product_categories_id', [], null, ['class' => 'form-control', 'placeholder' => '請先選擇應用類別', 'id' => 'product_categories_id', 'required' => true]) !!}
</div>

<!-- Version Field -->
<div class="form-group col-sm-4">
    {!! Form::label('version', '產品型號(機型版本):') !!}
    {!! Form::text('version', null, ['class' => 'form-control']) !!}
</div>
<div class="clearfix w-100"></div>

<!-- 'bootstrap / Toggle Switch Quick Bucket Changer Field' -->
<div class="form-group col-sm-6">
    <div class="custom-control custom-switch">
        {!! Form::checkbox('quick_bucket_changer', 1, null,  ['class' => 'custom-control-input', 'id' => 'quick_bucket_changer']) !!}
        {!! Form::label('quick_bucket_changer', '快速換斗器', ['class' => 'custom-control-label']) !!}
    </div>
</div>
<div class="clearfix w-100"></div>

<!-- 'bootstrap / Toggle Switch Operating Converter Field' -->
<div class="form-group col-sm-6">
    <div class="custom-control custom-switch">
        {!! Form::checkbox('operating_converter', 1, null,  ['class' => 'custom-control-input', 'id' => 'operating_converter']) !!}
        {!! Form::label('operating_converter', '操作轉換器', ['class' => 'custom-control-label']) !!}
    </div>
</div>
<div class="clearfix w-100"></div>

<!-- 多語系欄位 -->
<div class="card col-sm-12">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" role="tablist">
            @foreach(config('translatable.locales') as $locale)
                <li class="nav-item">
                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $locale }}" role="tab">
                        {{ strtoupper($locale) === 'ZH_TW' ? '中文' : 'English' }} 語系
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            @foreach(config('translatable.locales') as $locale)
                <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="{{ $locale }}" role="tabpanel">

                    <!-- Name Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label($locale.'[name]', '產品名稱('.strtoupper($locale).'):') !!}
                        {!! Form::text($locale.'[name]', isset($productsInfo) ? $productsInfo->translate($locale)->name : null, ['class' => 'form-control', 'required' => true]) !!}
                    </div>

                    <!-- Piping Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label($locale.'[piping]', '配管('.strtoupper($locale).'):') !!}
                        {!! Form::text($locale.'[piping]', isset($productsInfo) ? $productsInfo->translate($locale)->piping : null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Glue Block Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label($locale.'[glue_block]', '膠塊('.strtoupper($locale).'):') !!}
                        {!! Form::text($locale.'[glue_block]', isset($productsInfo) ? $productsInfo->translate($locale)->glue_block : null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Introduction Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label($locale.'[introduction]', '產品介紹('.strtoupper($locale).'):') !!}
                        {!! Form::textarea($locale.'[introduction]', isset($productsInfo) ? $productsInfo->translate($locale)->introduction : null, ['class' => 'form-control tinymce-editor tinymce-editor-introductions']) !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


<!-- Product Images Field -->
<div class="form-group col-sm-12">
    {!! Form::label('product_images', '產品圖片:') !!}
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="product_images" name="product_images[]" multiple
                accept="image/*">
            <label class="custom-file-label" for="product_images">選擇圖片（可多選）</label>
        </div>
    </div>
    <small class="text-muted">可拖曳圖片進行排序，<span id="remaining-count">剩餘可上傳: 10 張</span>，每個產品最多10張圖片</small>
</div>

<!-- 圖片預覽與排序區域 -->
<div class="form-group col-sm-12">
    <label>圖片預覽與排序</label>
    <div class="row sortable-container" id="image-preview-container">
        @if (isset($product) && $product->images->count() > 0)
            @foreach ($product->images as $image)
                <div class="col-md-3 mb-3 image-item" data-image-id="{{ $image->id }}">
                    <div class="card">
                        <div class="card-header2 p-1 bg-light d-flex justify-content-between align-items-center">
                            <span class="drag-handle"><i class="fas fa-grip-lines"></i></span>
                            <button type="button" class="btn btn-sm btn-danger delete-image"><i
                                    class="fas fa-times"></i></button>
                        </div>
                        <img src="{{ asset('uploads/' . $image->image_path) }}" class="card-img-top" alt="產品圖片"
                            style="height: 150px; object-fit: cover;">
                        <input type="hidden" name="image_ids[]" value="{{ $image->id }}">
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

@push('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <style>
        .drag-handle {
            cursor: move;
        }

        .ui-sortable-helper {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .ui-sortable-placeholder {
            visibility: visible !important;
            border: 2px dashed #ccc;
            background-color: #f8f9fa;
            height: 220px;
        }

        .opacity-50 {
            opacity: 0.5;
        }
    </style>
@endpush

@push('third_party_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js"
        integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://cdn.tiny.cloud/1/1ugon3r0i7rnpx6jhdz4moygn9knxfai212wbqlixzr9hpi8/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script> --}}
    <script src="{!! asset('vendor/tinymce/js/tinymce/tinymce.js') !!}"></script>
@endpush

@push('page_scripts')
    <script src="{{ asset('assets/admin/js/products.js') }}" referrerpolicy="no-referrer"></script>
    <script>
        const loadingSwal = Swal.fire({
            title: '載入中...',
            text: '請稍候',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        // 頁面完全載入後（包含所有圖片和資源）關閉載入動畫
        $(window).on('load', function() {
            loadingSwal.close();
        });

        // 也可以設定一個逾時機制，避免載入過久
        setTimeout(function() {
            loadingSwal.close();
        }, 5000); // 5秒後自動關閉

        $(function() {
            // 用於追蹤目前選擇的檔案
            let selectedFiles = [];
            let fileIndices = {};

            // 圖片數量限制
            const MAX_IMAGES = 10;

            // 顯示檔案名稱
            $('.custom-file-input').on('change', function() {
                const inputFiles = Array.from(this.files);

                // 檢查總圖片數量是否會超過限制
                const existingImageCount = $('.image-item').not('.new-image').not('.opacity-50').length;
                const totalImagesAfterUpload = existingImageCount + inputFiles.length;

                if (totalImagesAfterUpload > MAX_IMAGES) {
                    alert(`每個產品最多只能有 ${MAX_IMAGES} 張圖片。目前已有 ${existingImageCount} 張，您選擇了 ${inputFiles.length} 張。`);
                    resetFileInput();
                    return;
                }

                // 儲存選擇的檔案
                selectedFiles = inputFiles;

                // 更新顯示的檔案名稱
                updateFileLabel();

                // 清除之前的新圖片預覽
                $('.new-image').remove();

                // 預覽新上傳的圖片
                selectedFiles.forEach((file, index) => {
                    fileIndices[index] = index; // 追蹤原始索引
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        // 建立新圖片預覽區塊
                        const imageItemHtml = `
                        <div class="col-md-3 mb-3 image-item new-image" data-file-index="${index}">
                            <div class="card">
                                <div class="card-header2 p-1 bg-light d-flex justify-content-between align-items-center">
                                    <span class="drag-handle"><i class="fas fa-grip-lines"></i></span>
                                    <button type="button" class="btn btn-sm btn-danger delete-new-image"><i class="fas fa-times"></i></button>
                                </div>
                                <img src="${e.target.result}" class="card-img-top" alt="新圖片預覽" style="height: 150px; object-fit: cover;">
                                <div class="card-footer p-1 text-center">
                                    <small class="text-muted">${file.name}</small>
                                </div>
                                <input type="hidden" name="new_images[]" value="${index}">
                            </div>
                        </div>
                    `;

                        $('#image-preview-container').append(imageItemHtml);

                        // 重新初始化排序功能
                        initSortable();
                    };

                    reader.readAsDataURL(file);
                });
            });

            // 更新檔案標籤顯示
            function updateFileLabel() {
                const fileNames = selectedFiles.map(file => file.name);
                if (fileNames.length > 0) {
                    $('.custom-file-label').html(fileNames.join(', '));
                } else {
                    $('.custom-file-label').html('選擇圖片（可多選）');
                }
            }

            // 在產品圖片區域顯示剩餘可上傳數量
            function updateRemainingCount() {
                const existingImageCount = $('.image-item').not('.opacity-50').length;
                const remainingCount = MAX_IMAGES - existingImageCount;

                $('#remaining-count').text(`剩餘可上傳: ${remainingCount} 張`);

                // 如果已達上限，禁用上傳按鈕
                if (remainingCount <= 0) {
                    $('#product_images').prop('disabled', true);
                    $('.custom-file-label').text('已達上傳上限');
                } else {
                    $('#product_images').prop('disabled', false);
                }
            }

            // 初始更新剩餘數量
            updateRemainingCount();

            // 初始化拖曳排序
            function initSortable() {
                $('.sortable-container').sortable({
                    items: '.image-item',
                    handle: '.drag-handle',
                    cursor: 'move',
                    placeholder: 'col-md-3 mb-3 ui-sortable-placeholder',
                    update: function(event, ui) {
                        // 更新排序順序（將在表單提交時處理）
                    }
                }).disableSelection();
            }

            // 初始化排序功能
            initSortable();

            // 刪除現有圖片
            $(document).on('click', '.delete-image', function() {
                const imageItem = $(this).closest('.image-item');
                const imageId = imageItem.data('image-id');

                // 添加一個隱藏欄位，標記要刪除的圖片
                $('<input>').attr({
                    type: 'hidden',
                    name: 'delete_images[]',
                    value: imageId
                }).appendTo('form');

                // 視覺上標記為刪除，而不是完全移除
                imageItem.addClass('opacity-50');
                $(this).removeClass('btn-danger').addClass('btn-success').html(
                    '<i class="fas fa-undo"></i>');
                $(this).removeClass('delete-image').addClass('restore-image');

                // 更新剩餘可上傳數量
                updateRemainingCount();
            });

            // 復原刪除現有圖片
            $(document).on('click', '.restore-image', function() {
                const imageItem = $(this).closest('.image-item');
                const imageId = imageItem.data('image-id');

                // 移除標記刪除的隱藏欄位
                $('input[name="delete_images[]"][value="' + imageId + '"]').remove();

                // 視覺上恢復正常
                imageItem.removeClass('opacity-50');
                $(this).removeClass('btn-success').addClass('btn-danger').html(
                    '<i class="fas fa-times"></i>');
                $(this).removeClass('restore-image').addClass('delete-image');

                // 更新剩餘可上傳數量
                updateRemainingCount();
            });

            // 刪除新上傳的圖片預覽
            $(document).on('click', '.delete-new-image', function() {
                const imageItem = $(this).closest('.image-item');
                const fileIndex = imageItem.data('file-index');

                // 從選取的檔案陣列中移除此檔案
                if (fileIndex !== undefined) {
                    // 移除檔案
                    selectedFiles = selectedFiles.filter((_, index) => index !== fileIndex);

                    // 更新檔案索引映射
                    const newFileIndices = {};
                    let newIndex = 0;

                    for (let i = 0; i < selectedFiles.length; i++) {
                        if (i !== fileIndex) {
                            newFileIndices[newIndex] = i;
                            newIndex++;
                        }
                    }

                    fileIndices = newFileIndices;

                    // 更新顯示標籤
                    updateFileLabel();
                }

                // 移除預覽
                imageItem.remove();

                // 檢查是否還有新圖片預覽，如果沒有則重置檔案選擇器
                if ($('.new-image').length === 0) {
                    resetFileInput();
                }

                // 更新剩餘可上傳數量
                updateRemainingCount();
            });

            // 重置檔案選擇器
            function resetFileInput() {
                // 清空檔案選擇器的值
                $('#product_images').val('');

                // 清空選取的檔案陣列
                selectedFiles = [];
                fileIndices = {};

                // 重置標籤文字
                $('.custom-file-label').html('選擇圖片（可多選）');
            }

            // 表單提交前處理
            $('form').on('submit', function() {
                // 檢查總圖片數量是否超過限制
                const visibleImageCount = $('.image-item').not('.opacity-50').length;
                const newImageCount = $('.new-image').length;

                // 計算實際有效圖片數（現有未刪除 + 新上傳）
                const activeImageCount = visibleImageCount - newImageCount + selectedFiles.length;

                if (activeImageCount > MAX_IMAGES) {
                    alert(`每個產品最多只能有 ${MAX_IMAGES} 張圖片，請刪除部分圖片後再提交。`);
                    return false;
                }

                // 處理混合排序情況
                let sortOrder = 0;

                // 取得所有圖片元素（包括現有和新上傳的）
                $('.sortable-container .image-item').not('.opacity-50').each(function() {
                    // 檢查是否為現有圖片
                    const imageId = $(this).data('image-id');
                    if (imageId) {
                        // 更新現有圖片的排序值
                        $(this).find('input[name="image_ids[]"]').val(imageId);
                        $(this).append('<input type="hidden" name="sort_orders[' + imageId +
                            ']" value="' + sortOrder + '">');
                    }

                    // 檢查是否為新上傳圖片
                    const fileIndex = $(this).data('file-index');
                    if (fileIndex !== undefined) {
                        // 確保新圖片的排序值正確
                        $(this).find('input[name="new_images[]"]').val(fileIndex);
                        $(this).append('<input type="hidden" name="new_sort_orders[]" value="' +
                            sortOrder + '">');
                    }

                    sortOrder++;
                });

                return true;
            });



            // 儲存當前產品的品牌和產品類別ID (如果是編輯頁面)
            var currentBrandId = {{ isset($productsInfo) && $productsInfo->brands_info_id ? $productsInfo->brands_info_id : 'null' }};
            var currentProductCategoryId = {{ isset($productsInfo) && $productsInfo->product_categories_id ? $productsInfo->product_categories_id : 'null' }};

            // 應用類別選擇變更事件
            $('#application_categories_info_id').on('change', function() {
                var applicationCategoryId = $(this).val();

                // 清空產品品牌和產品類別下拉選單
                $('#brands_info_id').empty().append('<option value="">請選擇</option>');
                $('#product_categories_id').empty().append('<option value="">請選擇</option>');

                if (!applicationCategoryId) {
                    return;
                }

                // 發送 AJAX 請求獲取對應數據
                $.ajax({
                    url: "{{ localized_route('admin.get-categories-data') }}",
                    type: 'GET',
                    data: {
                        application_category_id: applicationCategoryId
                    },
                    dataType: 'json',
                    success: function(response) {
                        // 填充產品品牌下拉選單
                        if (response.brands && Object.keys(response.brands).length > 0) {
                            $.each(response.brands, function(id, name) {
                                $('#brands_info_id').append(
                                    $('<option></option>').val(id).text(name)
                                );
                            });

                            // 如果是編輯頁面，選中原有的品牌
                            if (currentBrandId) {
                                $('#brands_info_id').val(currentBrandId);
                            }
                        }

                        // 填充產品類別下拉選單
                        if (response.productCategories && Object.keys(response.productCategories).length > 0) {
                            $.each(response.productCategories, function(id, name) {
                                $('#product_categories_id').append(
                                    $('<option></option>').val(id).text(name)
                                );
                            });

                            // 如果是編輯頁面，選中原有的產品類別
                            if (currentProductCategoryId) {
                                $('#product_categories_id').val(currentProductCategoryId);
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('獲取數據失敗:', error);
                    }
                });
            });

            // 如果是編輯頁面，初始加載相關數據
            if ($('#application_categories_info_id').val()) {
                $('#application_categories_info_id').trigger('change');
            }
        });
    </script>
@endpush
