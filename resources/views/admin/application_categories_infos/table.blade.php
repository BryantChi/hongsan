<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="application-categories-infos-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>名稱</th>
                {{-- <th>操作</th> --}}
            </tr>
            </thead>
            <tbody>
            @foreach($applicationCategoriesInfos as $applicationCategoriesInfo)
                <tr>
                    <td>{{ $applicationCategoriesInfo->id }}</td>
                    <td>{{ $applicationCategoriesInfo->name }}</td>
                    {{-- <td  style="width: 120px">
                        {!! Form::open(['route' => ['admin.applicationCategoriesInfos.destroy', $applicationCategoriesInfo->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ localized_route('admin.applicationCategoriesInfos.show', [$applicationCategoriesInfo->id]) }}"
                               class='btn btn-default btn-md'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ localized_route('admin.applicationCategoriesInfos.edit', [$applicationCategoriesInfo->id]) }}"
                               class='btn btn-default btn-md'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-md', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td> --}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $applicationCategoriesInfos])
        </div>
    </div>
</div>
