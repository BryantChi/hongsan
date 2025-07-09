<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="hero-slides-table">
            <thead>
            <tr>
                <th>編號</th>
                <th>名稱</th>
                <th>連結</th>
                <th>Image 624</th>
                <th>Image 1024</th>
                <th>Image 1280</th>
                <th>Image 1920</th>
                <th>排序</th>
                <th>狀態</th>
                <th colspan="3">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($heroSlides as $heroSlide)
                <tr>
                    <td>{{ $heroSlide->id }}</td>
                    <td style="min-width: 300px">
                        @foreach($heroSlide->translations as $translation)
                            {{-- 表格化，美化要對齊 --}}
                            <div class="d-flex flex-lg-row flex-column justify-content-start align-items-start mb-1 pb-2 {{ $loop->last ? 'border-bottom-0' : 'border-bottom' }}">
                                <span class="col-md-6 mr-2 font-weight-bold">{{ strtoupper($translation->locale) === 'ZH_TW' ? '中文' : 'English' }}:</span>
                                <span class="col text-start text-wrap">{{ $translation->title }}</span>
                            </div>
                        @endforeach
                    </td>
                    <td>{{ $heroSlide->link ? $heroSlide->link : '-' }}</td>
                    <td>
                        @foreach ($heroSlide->translations as $translation)
                            {{-- 顯示每個語系的圖片 --}}
                            <p>{{ $translation->locale }}</p>
                            <a href="{{ asset('uploads/'.$translation->image_624) }}" data-fancybox="{{ $translation->locale }}-img-{{ $heroSlide->id }}">
                                <img src="{{ asset('uploads/'.$translation->image_624) }}" width="100">
                            </a>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($heroSlide->translations as $translation)
                            {{-- 顯示每個語系的圖片 --}}
                            <p>{{ $translation->locale }}</p>
                            <a href="{{ asset('uploads/'.$translation->image_1024) }}" data-fancybox="{{ $translation->locale }}-img-{{ $heroSlide->id }}">
                                <img src="{{ asset('uploads/'.$translation->image_1024) }}" width="100">
                            </a>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($heroSlide->translations as $translation)
                            {{-- 顯示每個語系的圖片 --}}
                            <p>{{ $translation->locale }}</p>
                            <a href="{{ asset('uploads/'.$translation->image_1280) }}" data-fancybox="{{ $translation->locale }}-img-{{ $heroSlide->id }}">
                                <img src="{{ asset('uploads/'.$translation->image_1280) }}" width="100">
                            </a>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($heroSlide->translations as $translation)
                            {{-- 顯示每個語系的圖片 --}}
                            <p>{{ $translation->locale }}</p>
                            <a href="{{ asset('uploads/'.$translation->image_1920) }}" data-fancybox="{{ $translation->locale }}-img-{{ $heroSlide->id }}">
                                <img src="{{ asset('uploads/'.$translation->image_1920) }}" width="100">
                            </a>
                        @endforeach
                    </td>
                    <td>{{ $heroSlide->sort_order }}</td>
                    <td>
                        @if($heroSlide->status)
                            <span class="badge badge-success">啟用</span>
                        @else
                            <span class="badge badge-danger">停用</span>
                        @endif
                    </td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['admin.heroSlides.destroy', $heroSlide->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            {{-- <a href="{{ localized_route('admin.heroSlides.show', [$heroSlide->id]) }}"
                               class='btn btn-default btn-md'>
                                <i class="far fa-eye"></i>
                            </a> --}}
                            <a href="{{ localized_route('admin.heroSlides.edit', [$heroSlide->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $heroSlides])
        </div>
    </div>
</div>
