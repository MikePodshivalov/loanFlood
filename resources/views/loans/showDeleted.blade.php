
@extends('layouts.backend')
@section('content')
    <div class="content content-full content-boxed">
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                @include('layouts.loan.table')
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="text-center bg-body-light ">
                    <div class="dt-buttons btn-group flex-wrap">
                        <button class="btn btn-sm btn-primary buttons-copy buttons-html5" tabindex="0" aria-controls="DataTables_Table_1" type="button">
                            <span>Copy</span>
                        </button>
                        <button class="btn btn-sm btn-primary buttons-csv buttons-html5" tabindex="0" aria-controls="DataTables_Table_1" type="button">
                            <span>CSV</span>
                        </button>
                        <button class="btn btn-sm btn-primary buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_1" type="button">
                            <span>Excel</span>
                        </button>
                        <button class="btn btn-sm btn-primary buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_1" type="button">
                            <span>PDF</span>
                        </button>
                        <button class="btn btn-sm btn-primary buttons-print" tabindex="0" aria-controls="DataTables_Table_1" type="button">
                            <span>Print</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
