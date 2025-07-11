@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>產品資訊</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ localized_route('admin.productsInfos.create') }}">
                        <i class="fas fa-plus"></i>
                        新增
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('admin.products_infos.table')
        </div>
    </div>

@endsection

@push('page_css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <style>
        .min-w-300 {
            min-width: 300px;
        }

        #products-infos-table tbody td {
            vertical-align: top;
        }
    </style>
@endpush


@push('page_scripts')
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js">
    </script>
    <script>
         // 定義一個全局變數
        var dataTable;

        $(function() {
            let scrollX_enable = "{{ count($productsInfos) > 0 ? 1 : 0 }}" == true;
            if($(window).width() > 1280) { scrollX_enable = false }
            else { scrollX_enable = "{{ count($productsInfos) > 0 ? 1 : 0 }}" == true; }

            dataTable = $('#products-infos-table').DataTable({
                processing: true,
                serverSide: false, // 由於我們已經預先處理了所有數據，不需要服務器端處理
                ajax: {
                    url: "{{ route('admin.productsInfos.data') }}",
                    // 避免 DataTable 自動添加不必要的參數
                    data: function(d) {
                        return $.extend({}, d, {});
                    }
                },
                deferRender: true,
                // deferLoading: true,      // 延遲載入
                scroller: true,          // 啟用滾動分頁
                lengthChange: true,
                // 全部顯示
                // lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "全部"]],
                // 每頁顯示數量選單
                lengthMenu: [[10, 25, 50, 100, 500, -1],
                    [10, 25, 50, 100, 500, "全部"]
                ],
                pageLength: 10, // 不用選單設定也可改用固定每頁列數

                searching: true, // 搜索功能
                ordering: true,
                stateSave: true, // 保留狀態
                scrollCollapse: true,
                scrollX: scrollX_enable,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/zh_Hant.json"
                },
                columns: [
                    { data: 'id' },
                    { data: 'prod_img_cover', orderable: false, searchable: false },
                    { data: 'name', orderable: false },
                    { data: 'application_category' },
                    { data: 'brand' },
                    { data: 'product_category' },
                    { data: 'version' },
                    { data: 'quick_bucket_changer', orderable: false },
                    { data: 'operating_converter', orderable: false },
                    { data: 'piping', orderable: false },
                    { data: 'glue_block', orderable: false },
                    { data: 'actions', orderable: false }
                ],
                columnDefs: [
                    {
                        targets: [1, 8, 9],
                        width: '300px',
                        className: 'min-w-300'
                    },
                    {
                        targets: [10],
                        width: '120px'
                    }
                ]
                // columnDefs: [{
                //     'targets': 0,
                //     'searchable': false,
                //     'orderable': false,
                //     'className': 'dt-body-center',
                //     'render': function (data, type, full, meta) {
                //         var d = JSON.parse(data);
                //         return '<input type="checkbox" name="reports[]"  style="width: 20px;height: 20px;" value="' + $('<div/>').text(d.id).html() + '" data-letter="' + $('<div/>').text(d.letter_id).html() + '" data-status="' + $('<div/>').text(d.reports_authorize_status).html() + '">';
                //     }
                // }],
                // dom: 'Bfrtip',  // 這行代碼是必須的，用於告訴 DataTables 插入哪些按鈕
                // buttons: [
                //     {
                //         extend: 'excel',
                //         // text: '導出已篩選的數據到 Excel',
                //         exportOptions: {
                //             modifier: {
                //                 search: 'applied',  // 這裡確保只有已篩選的數據會被導出
                //                 order: 'applied'   // 這裡確保導出的數據與目前的排序方式一致
                //             },
                //             rows: function (idx, data, node) {
                //                 return $(node).find('input[name="reports[]"]').prop('checked');
                //             },
                //             columns: [1,2,3,4,5,6,7,8,9,10,11,14,15,17],
                //         }
                //     }
                // ],
            });

            // dataTable.draw();
        })

        // 確保 table 變數在作用域內
        // setTimeout(() => {
        //     if (table) {
        //         table.draw();
        //     }
        // }, 600);

    </script>
@endpush
