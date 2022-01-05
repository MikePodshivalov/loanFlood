<div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
    <div class="row">
        <div id="example_wrapper" class="col-xl-12 dataTables_wrapper">
            <table class="myTable display nowrap dataTable dtr-inline collapsed">
                <thead>
                <tr>
                    <th class="text-center" style="width: 80px;">
                        Id
                    </th>
                    <th class="text-center" style="width: 25%;">
                        Заемщик
                    </th>
                    <th class="text-center" style="width: 10%;">
                        ИНН
                    </th>
                    <th class="text-center" style="width: 8%;">
                        Тип
                    </th>
                    <th class="text-center" style="width: 10%;">
                        Млн. руб.
                    </th>
                    <th style="width: 10%;" class="text-center">
                        Дата создания
                    </th>
                    <th style="width: 15%;" class="text-center">
                        Действия
                    </th>
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
                                <b>{{$loan->name}}</b>
                            </td>
                            <td class="text-center">
                                {{$loan->inn}}
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
                            <td class="text-center">
                                <form action="{{route('loans.destroy', $loan)}}" method="post" id="form-id-{{$loan->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <a data-tooltip="Подробнее" style="font-size: xx-small;" href="{{ route('loans.show', $loan) }}">
                                        <i class="far fa-2x fa-eye"></i>
                                    </a>
                                    <a data-tooltip="Редактирование" style="font-size: xx-small;" href="{{ route('loans.edit', $loan) }}">
                                        <i class="far fa-2x fa-edit"></i>
                                    </a>
                                        <a data-tooltip="Удаление" style="font-size: xx-small;" href="#" onclick="document.getElementById('form-id-{{$loan->id}}').submit();">
                                            <i class="far fa-2x fa-window-close"></i>
                                        </a>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
