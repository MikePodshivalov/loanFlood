@extends('layouts.backend')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons dataTable no-footer" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                                <thead>
                                <tr>
                                    <th class="d-none d-sm-table-cell sorting" style="width: 5%;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">
                                        Id
                                    </th>
                                    <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">
                                        Заемщик
                                    </th>
                                    <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">
                                        ИНН
                                    </th>
                                    <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">
                                        Тип
                                    </th>
                                    <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">
                                        Сумма, тыс. руб.
                                    </th>
                                    <th style="width: 15%;" class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1">
                                        Создатель
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($loans->items() as $loan)
                                    <tr class="odd">
                                        <td class="text-center sorting_1">
                                            {{$loan->id}}
                                        </td>
                                        <td class="fw-semibold">
                                            <a href="be_pages_generic_blank.html">
                                                {{$loan->name}}
                                            </a>
                                        </td>
                                        <td class="text-center sorting_1">
                                            {{$loan->inn}}
                                        </td>
                                        <td class="text-center sorting_1">
                                            {{$loan->type}}
                                        </td>
                                        <td class="text-center sorting_1">
                                            {{number_format($loan->amount, 0, ' ', ' ')}}
                                        </td>
                                        <td class="text-center sorting_1">
                                            {{$loan->creator}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                       </div>
                    </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center bg-body-light py-2 mb-2">
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
    <div class="row">
        <div class="dataTables_info col-sm-12 col-md-5" id="DataTables_Table_0_info" role="status" aria-live="polite">
            Page <strong>1</strong> of <strong>4</strong>
        </div>
        <ul class="pagination col-sm-12 col-md-7">
            <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">
                    <i class="fa fa-angle-left"></i>
                </a>
            </li>
            <li class="paginate_button page-item active">
                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">
                    1
                </a>
            </li>
            <li class="paginate_button page-item ">
                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">
                    2
                </a>
            </li>
            <li class="paginate_button page-item ">
                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" class="page-link">
                    3
                </a>
            </li>
            <li class="paginate_button page-item ">
                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="4" tabindex="0" class="page-link">
                    4
                </a>
            </li>
            <li class="paginate_button page-item next" id="DataTables_Table_0_next">
                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="5" tabindex="0" class="page-link">
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        </ul>
    </div>
@endsection
