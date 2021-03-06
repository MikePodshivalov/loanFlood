<div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
    <div class="row">
        <div id="example_wrapper" class="col-xl-12 dataTables_wrapper">
            <table class="table-hover table-bordered">
                <thead>
                <tr>
                    <th class="text-center" style="width: 7%;">
                        Id
                    </th>
                    <th class="text-center" style="width: 25%;">
                        Заемщик
                    </th>
                    <th class="text-center" style="width: 10%;">
                        Инициатор
                    </th>
                    <th class="text-center" style="width: 12%;">
                        Тип
                    </th>
                    <th class="text-center" style="width: 10%;">
                        Млн. руб.
                    </th>
                    <th style="width: 10%;" class="text-center">
                        Дата создания
                    </th>
                    <th style="width: 17%;" class="text-center">
                        Статус
                    </th>
                    @if(Auth::user()->hasPermissionTo('edit loan') || Auth::user()->hasAnyRole('km', 'km_main'))
                        <th style="width: 15%;" class="text-center">
                            Действия
                        </th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @if(isset($loans) && !empty($loans))
                    @foreach($loans as $loan)
                        <tr class="odd">
                            <td class="text-center">
                                {{$loan->id}}
                            </td>
                            <td>
                                <a href="{{ route('loans.show', $loan) }}">
                                    <b>{{$loan->name}}</b>
                                </a>
                            </td>
                            <td class="text-center">
                                {{$loan->initiator}}
                            </td>
                            <td class="text-center">
                                {{$loan->type}}
                            </td>
                            <td class="text-center">
                                {{number_format($loan->amount, 0, ' ', ' ')}}
                            </td>
                            <td class="text-center">
                                {{date('d-m-Y', strtotime($loan->created_at))}}
                            </td>
                            <td class="text-center small">
                                {{$loan->statuses->simple_status}}
                            </td>
                            @if(Auth::user()->hasPermissionTo('edit loan') || Auth::user()->hasAnyRole('km', 'km_main'))
                                <td class="text-center">
                                    <div class="align-middle" style="height: 20px;">
                                        <form action="{{route('loans.destroy', $loan)}}" method="post" id="form-id-{{$loan->id}}">
                                            @csrf
                                            @method('DELETE')
    {{--                                        <a data-tooltip="Подробнее" style="font-size: x-small;" href="{{ route('loans.show', $loan) }}">--}}
    {{--                                            <i class="far fa-2x fa-eye"></i>--}}
    {{--                                        </a>--}}

                                                <a data-tooltip="Редактирование" style="font-size: xx-small;" href="{{ route('loans.edit', $loan) }}">
                                                    <i class="far fa-2x fa-edit"></i>
                                                </a>
                                                <a data-tooltip="Удаление" style="font-size: xx-small;" href="#" onclick="document.getElementById('form-id-{{$loan->id}}').submit();">
                                                    <i class="far fa-2x fa-window-close"></i>
                                                </a>
                                        </form>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="dataTables_paginate paging_simple_numbers">
            <ul class="pagination">
                @if(!isset($_GET['verified']))
                    {{ $loans->withQueryString()->links('vendor.pagination.bootstrap-4') }}
                @endif
            </ul>
        </div>
    </div>
</div>
