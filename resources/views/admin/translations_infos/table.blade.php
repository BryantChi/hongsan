<div class="card-body p-0">
    <div class="table-responsive p-3">
        <table class="table" id="translations-infos-table">
            <thead>
            <tr>
                <th>Key</th>
                @foreach (config('translatable.locales') as $locale)
                    <th>{{ strtoupper($locale) === 'ZH_TW' ? '中文' : 'English' }} Translation</th>
                @endforeach
                <th>備註</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($translationsInfos as $translationsInfo)
                <tr>
                    <td>{{ $translationsInfo->key }}</td>
                    @foreach (config('translatable.locales') as $locale)
                        <td>
                            @if(isset($translationsInfo->translations[$locale]))
                                {{ $translationsInfo->translations[$locale] }}
                            @else
                                <span class="text-muted">未翻譯</span>
                            @endif
                        </td>
                    @endforeach
                    <td>{{ $translationsInfo->note ?? '無' }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['admin.translationsInfos.destroy', $translationsInfo->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            {{-- <a href="{{ localized_route('admin.translationsInfos.show', [$translationsInfo->id]) }}"
                               class='btn btn-default btn-md'>
                                <i class="far fa-eye"></i>
                            </a> --}}
                            <a href="{{ localized_route('admin.translationsInfos.edit', [$translationsInfo->id]) }}"
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

    {{-- <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $translationsInfos])
        </div>
    </div> --}}
</div>
