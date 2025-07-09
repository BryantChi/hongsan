@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>輪播圖管理</h1>
                </div>
                <div class="col-sm-6 {{ count($heroSlides) > 6 ? 'd-none' : '' }}">
                    <a class="btn btn-primary float-right"
                       href="{{ localized_route('admin.heroSlides.create') }}">
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
            @include('admin.hero_slides.table')
        </div>
    </div>

@endsection
