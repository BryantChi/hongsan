<div class="card-body p-0">
    <div class="table-responsive p-3">
        <table class="table" id="products-infos-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>名稱</th>
                <th>應用類別</th>
                <th>產品品牌</th>
                <th>產品類別</th>
                <th>產品型號(機型)</th>
                <th>快速換斗器</th>
                <th>操作轉換器</th>
                <th>配管</th>
                <th>膠塊</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($productsInfos as $productsInfo)
                <tr>
                    <td>{{ $productsInfo->id }}</td>
                    <td style="min-width: 300px">
                        {{-- 顯示產品名稱 --}}
                        {{-- 獲取目前語系的名稱 --}}
                        @foreach($productsInfo->translations as $translation)
                            {{-- 表格化，美化要對齊 --}}
                            <div class="d-flex flex-lg-row flex-column justify-content-start align-items-start mb-1 pb-2 {{ $loop->last ? 'border-bottom-0' : 'border-bottom' }}">
                                <span class="col-md-6 mr-2 font-weight-bold">{{ strtoupper($translation->locale) === 'ZH_TW' ? '中文' : 'English' }}:</span>
                                <span class="col text-start text-wrap">{{ $translation->name }}</span>
                            </div>
                        @endforeach
                    </td>
                    <td>
                        @php
                            // 顯示應用類別名稱
                            // 使用 translations 來獲取所有語系的名稱
                            // 獲取應用類別名稱
                            $productsInfo->application_categories_info_id = $productsInfo->application_categories_info_id ?? null;
                            // 如果沒有設定 application_categories_info_id，則顯示 '無'
                            if (is_null($productsInfo->application_categories_info_id)) {
                                $applicationCategoriesInfo = '無';
                            } else {
                                // 否則，獲取對應的應用類別名稱
                                $applicationCategoriesInfo = \App\Models\Admin\ApplicationCategoriesInfo::where('id', $productsInfo->application_categories_info_id)->first()->name;
                                if ($productsInfo->application_categories_info_id == 1) {
                                    // 如果是建設機械，則顯示購買/租賃選項
                                    $applicationCategoriesInfo .= ' - ' . ($productsInfo->purchase_lease == 'purchase' ? '購買' : ($productsInfo->purchase_lease == 'lease' ? '租賃' : '無'));
                                }
                            }
                        @endphp
                        {{ $applicationCategoriesInfo }}
                    </td>
                    <td>
                        @php
                            // 顯示產品品牌名稱
                            // 使用 translations 來獲取所有語系的名稱
                            $productsInfo->brands_info_id = $productsInfo->brands_info_id ?? null;
                            // 如果沒有設定 brands_info_id，則顯示 '無'
                            if (is_null($productsInfo->brands_info_id)) {
                                $brands = '無';
                            } else {
                                // 否則，獲取對應的品牌名稱，目前語系的名稱
                                $brands = \App\Models\Admin\BrandsInfo::where('id', $productsInfo->brands_info_id)->first()->name ?? '無';
                            }
                        @endphp
                        {!! $brands !!}
                    </td>
                    <td>
                        @php
                            // 顯示產品類別名稱
                            // 使用 translations 來獲取所有語系的名稱
                            $productsInfo->product_categories_id = $productsInfo->product_categories_id ?? null;
                            // 如果沒有設定 product_categories_id，則顯示 '無'
                            if (is_null($productsInfo->product_categories_id)) {
                                $productCategoriesInfo = '無';
                            } else {
                                // 否則，獲取對應的產品類別名稱，目前語系的名稱
                                $productCategoriesInfo = \App\Models\Admin\ProductCategories::where('id', $productsInfo->product_categories_id)->first()->name ?? '無';
                            }
                        @endphp
                        {!!$productCategoriesInfo !!}
                    </td>
                    <td>{{ $productsInfo->version }}</td>
                    <td>
                        {{-- 如果true，顯示icon --}}
                        @if ($productsInfo->quick_bucket_changer)
                            <i class="fas fa-check text-success"></i>
                        @else
                            <i class="fas fa-times text-danger"></i>
                        @endif
                    </td>
                    </td>
                    <td>
                        {{-- 如果true，顯示icon --}}
                        @if ($productsInfo->operating_converter)
                            <i class="fas fa-check text-success"></i>
                        @else
                            <i class="fas fa-times text-danger"></i>
                        @endif
                    </td>
                    <td style="min-width: 300px">
                        {{-- 顯示配管 --}}
                        {{-- 獲取目前語系的名稱 --}}
                        @foreach($productsInfo->translations as $translation)
                            {{-- 表格化，美化要對齊 --}}
                            <div class="d-flex flex-lg-row flex-column justify-content-start align-items-start mb-1 pb-2 {{ $loop->last ? 'border-bottom-0' : 'border-bottom' }}">
                                <span class="col-md-6 mr-2 font-weight-bold">{{ strtoupper($translation->locale) === 'ZH_TW' ? '中文' : 'English' }}:</span>
                                <span class="col text-start text-wrap">{{ $translation->piping }}</span>
                            </div>
                        @endforeach
                    </td>
                    <td style="min-width: 300px">
                        {{-- 顯示膠塊 --}}
                        {{-- 獲取目前語系的名稱 --}}
                        @foreach($productsInfo->translations as $translation)
                            {{-- 表格化，美化要對齊 --}}
                            <div class="d-flex flex-lg-row flex-column justify-content-start align-items-start mb-1 pb-2 {{ $loop->last ? 'border-bottom-0' : 'border-bottom' }}">
                                <span class="col-md-6 mr-2 font-weight-bold">{{ strtoupper($translation->locale) === 'ZH_TW' ? '中文' : 'English' }}:</span>
                                <span class="col text-start text-wrap">{{ $translation->glue_block }}</span>
                            </div>
                        @endforeach
                    </td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['admin.productsInfos.destroy', $productsInfo->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            {{-- <a href="{{ localized_route('admin.productsInfos.show', [$productsInfo->id]) }}"
                               class='btn btn-default btn-md'>
                                <i class="far fa-eye"></i>
                            </a> --}}
                            <a href="{{ localized_route('admin.productsInfos.edit', [$productsInfo->id]) }}"
                               class='btn btn-default btn-md'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'button', 'class' => 'btn btn-danger btn-md', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{-- <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $productsInfos])
        </div>
    </div> --}}
</div>
