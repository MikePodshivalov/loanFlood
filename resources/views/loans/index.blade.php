<link rel="stylesheet" href="{{ asset("js/myJS.js") }}">
@extends('layouts.backend')
@section('content')
    <div class="content content-full content-boxed">
        <div class="row">
            @if(Route::getFacadeRoot()->current()->uri() === 'loans')
                <form id="filter_form" action="{{route('loans.index')}}" method="get">
                    <div class="col-12 filter">
                        <input name="search_name" @if(isset($_GET['search_name'])) value="{{$_GET['search_name']}}" @endif type="text" class="form-control" id="exampleFormControlInput" placeholder="Поиск задачи">
                        <select name="type" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option value="">Тип</option>
                            @foreach(config('loanproduct') as $type)
                                <option value="{{$type}}" @if(isset($_GET['type'])) @if($_GET['type'] == $type) selected @endif @endif>{{$type}}</option>
                            @endforeach
                        </select>
                        <select name="simple_status" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option value="">Статус</option>
                            @foreach(config('simplestatus') as $status)
                                <option value="{{$status}}" @if(isset($_GET['simple_status'])) @if($_GET['simple_status'] == $status) selected @endif @endif>{{$status}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-alt-info mt-3">Фильтр</button>
                    <a href="{{ Route::current()->uri() }}">
                        <button type="button" class="btn btn-alt-danger mt-3">Сбросить</button>
                    </a>
                </form>
            @endif
        </div>
        <div class="content">
            @if(Auth::user()->hasPermissionTo('create loan') || Auth::user()->hasAnyRole('km', 'km_main'))
                <div class="block-content block-content-full">
                    <button class="btn-hero btn-primary" onclick="window.location='{{route('loans.create')}}'">
                        Создать новую задачу
                    </button>
                </div>
            @endif
        </div>
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                @include('layouts.loan.table')
            </div>
        </div>
{{--        <div class="row">--}}
{{--            <div class="col-xl-12">--}}
{{--                <div class="text-center bg-body-light ">--}}
{{--                    <div class="dt-buttons btn-group flex-wrap">--}}
{{--                        <button class="btn btn-sm btn-primary buttons-copy buttons-html5" tabindex="0" aria-controls="DataTables_Table_1" type="button">--}}
{{--                            <span>Copy</span>--}}
{{--                        </button>--}}
{{--                        <button class="btn btn-sm btn-primary buttons-csv buttons-html5" tabindex="0" aria-controls="DataTables_Table_1" type="button">--}}
{{--                            <span>CSV</span>--}}
{{--                        </button>--}}
{{--                        <button class="btn btn-sm btn-primary buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_1" type="button">--}}
{{--                            <span>Excel</span>--}}
{{--                        </button>--}}
{{--                        <button class="btn btn-sm btn-primary buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_1" type="button">--}}
{{--                            <span>PDF</span>--}}
{{--                        </button>--}}
{{--                        <button class="btn btn-sm btn-primary buttons-print" tabindex="0" aria-controls="DataTables_Table_1" type="button">--}}
{{--                            <span>Print</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endsection


