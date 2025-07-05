<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="brands-infos-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>名稱</th>
                <th>Slug</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($brandsInfos as $brandsInfo)
                <tr>
                    <td>{{ $brandsInfo->id }}</td>
                    <td style="width: 35%">
                        {{-- 顯示品牌名稱 --}}
                        {{-- 使用 translations 來獲取所有語系的名稱 --}}
                        @foreach($brandsInfo->translations as $translation)
                            {{-- 表格化，美化要對齊 --}}
                            <div class="d-flex flex-lg-row flex-column justify-content-start align-items-start mb-3">
                                <span class="col-lg-2 col-md-3 mr-2 font-weight-bold">{{ strtoupper($translation->locale) === 'ZH_TW' ? '中文' : 'English' }}:</span>
                                <span class="col-auto text-center">{{ $translation->name }}</span>
                            </div>
                        @endforeach
                    </td>
                    <td>{{ $brandsInfo->slug }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['admin.brandsInfos.destroy', $brandsInfo->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            {{-- <a href="{{ localized_route('admin.brandsInfos.show', [$brandsInfo->id]) }}"
                               class='btn btn-default btn-md'>
                                <i class="far fa-eye"></i>
                            </a> --}}
                            <a href="{{ localized_route('admin.brandsInfos.edit', [$brandsInfo->id]) }}"
                               class='btn btn-default btn-md'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'button', 'class' => 'btn btn-danger btn-md', 'onclick' => "return check(this)"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $brandsInfos])
        </div>
    </div>
</div>
