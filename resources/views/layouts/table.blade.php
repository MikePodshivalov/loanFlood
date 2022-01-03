<style>
    [data-tooltip] {
    position: relative; /* Относительное позиционирование */
    }
    [data-tooltip]::after {
    content: attr(data-tooltip); /* Выводим текст */
    position: absolute; /* Абсолютное позиционирование */
    width: 100px; /* Ширина подсказки */
    left: 0; top: 0; /* Положение подсказки */
    background: #0665d0; /* Синий цвет фона */
    color: #fff; /* Цвет текста */
    padding: 0.5em; /* Поля вокруг текста */
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); /* Параметры тени */
    pointer-events: none; /* Подсказка */
    opacity: 0; /* Подсказка невидима */
    transition: 1s; /* Время появления подсказки */
    }
    [data-tooltip]:hover::after {
    opacity: 1; /* Показываем подсказку */
    top: 2em; /* Положение подсказки */
    }
</style>
<div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
    <div class="row">
        <div id="example_wrapper" class="col-xl-12 dataTables_wrapper">
            <table class="myTable display nowrap dataTable dtr-inline collapsed">
                <thead>
                <tr>
                    <th class="text-center" style="width: 100px;">
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
                    <th class="text-center" style="width: 15%;">
                        Сумма, млн. руб.
                    </th>
                    <th style="width: 12%;" class="text-center">
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
                                {{$loan->amount / 1000}}
                            </td>
                            <td class="text-center">
                                {{date('d-m-Y', strtotime($loan->created_at))}}
                            </td>
                            <td class="text-center">
                                <a data-tooltip="Подробнее" style="font-size: xx-small;" href="{{ route('loans.show', $loan) }}">
                                    <i class="far fa-2x fa-eye"></i>
                                </a>
                                <a data-tooltip="Редактирование" style="font-size: xx-small;" href="{{ route('loans.edit', $loan) }}">
                                    <i class="far fa-2x fa-edit"></i>
                                </a>
                                <a data-tooltip="Удаление" style="font-size: xx-small;" href="{{ route('loans.destroy', $loan) }}">
                                    <i class="far fa-2x fa-window-close"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
