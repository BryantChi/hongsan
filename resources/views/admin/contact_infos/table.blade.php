<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="contact-infos-table">
            <thead>
                <tr>
                    <th>編號</th>
                    <th>姓名</th>
                    <th>車型</th>
                    <th>聯絡電話</th>
                    <th>Email</th>
                    <th>所在縣市</th>
                    <th>國家</th>
                    <th>訊息內容</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contactInfos as $contactInfo)
                    <tr>
                        <td>{{ $contactInfo->name }}</td>
                        <td>{{ $contactInfo->machine_type }}</td>
                        <td>{{ $contactInfo->phone }}</td>
                        <td>{{ $contactInfo->email }}</td>
                        <td>{{ $contactInfo->location }}</td>
                        <td>{{ $contactInfo->country }}</td>
                        <td>{{ $contactInfo->message }}</td>
                        <td style="width: 120px">
                            {!! Form::open(['route' => ['admin.contactInfos.destroy', $contactInfo->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                {{-- <a href="{{ localized_route('admin.contactInfos.show', [$contactInfo->id]) }}"
                               class='btn btn-default btn-md'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ localized_route('admin.contactInfos.edit', [$contactInfo->id]) }}"
                               class='btn btn-default btn-md'>
                                <i class="far fa-edit"></i>
                            </a> --}}
                                {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'button',
                                    'class' => 'btn btn-danger btn-md',
                                    'onclick' => 'return check(this)',
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
            @include('adminlte-templates::common.paginate', ['records' => $contactInfos])
        </div>
    </div>
</div>
