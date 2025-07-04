<div class="table-responsive">
    <table class="table" id="newsInfos-table">
        <thead>
            <tr>
                <th>ID</th>
                @foreach(config('translatable.locales') as $locale)
                    <th>標題 ({{ strtoupper($locale) }})</th>
                @endforeach
                <th>封面</th>
                <th>狀態</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($newsInfos as $newsInfo)
                <tr>
                    <td>{{ $newsInfo->id }}</td>
                    @foreach(config('translatable.locales') as $locale)
                        <td>
                            @if($newsInfo->translate($locale))
                                {{ $newsInfo->translate($locale)->title ?? '-' }}
                            @else
                                <span class="text-muted">未翻譯</span>
                            @endif
                        </td>
                    @endforeach
                    <td>
                        @if($newsInfo->cover_front_image)
                            <img src="{{ url('') . '/uploads/' . $newsInfo->cover_front_image }}"
                                 class="img-fluid" width="100" alt="">
                        @else
                            <span class="text-muted">無圖片</span>
                        @endif
                    </td>
                    <td>
                        <span class="badge {{ $newsInfo->status == 1 ? 'badge-success' : 'badge-secondary' }}">
                            {{ $newsInfo->status == 1 ? '啟用' : '停用' }}
                        </span>
                    </td>
                    <td width="120">
                        {!! Form::open(['route' => ['admin.newsInfos.destroy', $newsInfo->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            {{-- <a href="{{ localized_route('admin.newsInfos.show', [$newsInfo->id]) }}" class='btn btn-default btn-md'>
                                <i class="far fa-eye"></i>
                            </a> --}}
                            <a href="{{ localized_route('admin.newsInfos.edit', [$newsInfo->id]) }}"
                                class='btn btn-default btn-md'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                'type' => 'button',
                                'class' => 'btn btn-danger btn-md',
                                'onclick' => "return check(this);",
                            ]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
