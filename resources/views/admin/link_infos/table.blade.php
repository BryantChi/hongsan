<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="link-infos-table">
            <thead>
                <tr>
                    <th>編號</th>
                    <th>名稱</th>
                    <th>連結</th>
                    <th>圖片</th>
                    <th>排序</th>
                    <th>狀態</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($linkInfos as $linkInfo)
                    <tr>
                        <td>{{ $linkInfo->name }}</td>
                        <td>{{ $linkInfo->url }}</td>
                        <td>
                            @if ($linkInfo->image)
                                <img src="{{ asset('uploads/'.$linkInfo->image) }}" alt="" width="100">
                            @endif
                        </td>
                        <td>{{ $linkInfo->sort_order }}</td>
                        <td>
                            {{-- 狀態 --}}
                            @if ($linkInfo->status)
                                <span class="badge badge-success">啟用</span>
                            @else
                                <span class="badge badge-secondary">停用</span>
                            @endif
                        </td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['admin.linkInfos.destroy', $linkInfo->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ localized_route('admin.linkInfos.show', [$linkInfo->id]) }}"
                                    class='btn btn-default btn-md'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ localized_route('admin.linkInfos.edit', [$linkInfo->id]) }}"
                                    class='btn btn-default btn-md'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'button',
                                    'class' => 'btn btn-danger btn-md',
                                    'onclick' => "return check(this)",
                                ]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $linkInfos])
        </div>
    </div>
</div>
