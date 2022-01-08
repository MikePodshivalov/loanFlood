<link rel="stylesheet" href="{{ asset("css/my.css") }}">
@extends('layouts.backend')
@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-content block-content-full">
            <h3 class="mb-0 display-7"><b>{{$loan->name}} ({{$loan->type}})</b></h3>
            @include('loans.tags', ['tags' => $loan->tags])
            <table class="table longPath">
                <thead>
                <tr>
                    <th class="text-center" scope="col" style="width: 60px">ID</th>
                    <th class="text-center" scope="col" style="width: 80px">Группа</th>
                    <th class="text-center" scope="col">ИНН</th>
                    <th class="text-center" scope="col" style="width: 100px">Млн.руб.</th>
                    <th class="text-center" scope="col">Кем создана</th>
                    <th class="text-center" scope="col" style="width: 150px">Дата создания</th>
                    <th class="text-center" scope="col">Закл. ЗС</th>
                    <th class="text-center" scope="col">Закл. ПД</th>
                    <th class="text-center" scope="col">Закл. ИАБ</th>
                    <th class="text-center" scope="col">КСОВ</th>
                    <th class="text-center" scope="col">КК</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center">{{$loan->id}}</td>
                    <td class="text-center">{{$loan->group}}</td>
                    <td class="text-center">{{$loan->inn}}</td>
                    <td class="text-center">{{number_format($loan->amount, 0, ' ', ' ')}}</td>
                    <td class="text-center">{{$loan->creator}}</td>
                    <td class="text-center">{{date('d-m-Y', strtotime($loan->created_at))}}</td>
                    <td class="text-center longPathTd">

                    </td>
                    <td class="text-center longPathTd">

                    </td>
                    <td class="text-center longPathTd">

                    </td>
                    <td class="text-center longPathTd">

                    </td>
                    <td class="text-center longPathTd">

                    </td>
                </tr>
                </tbody>
            </table>
            <h4 class="display-8 mb-0 text-center mt-1">Исполнители: </h4>
            <table id="path-table" class="table longPath mt-0">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 15%">От УКК</th>
                        <th class="text-center" style="width: 15%">От ЗС</th>
                        <th class="text-center" style="width: 15%">От ПД</th>
                        <th class="text-center" style="width: 15%">От ИАБ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">УКК</td>
                        <td class="text-center">ЗС</td>
                        <td class="text-center">ПД</td>
                        <td class="text-center">ИАБ</td>
                    </tr>
                </tbody>
            </table>
            <h4 class="display-8 mb-1 text-center">Документы для работы: </h4>
            <table id="path-table" class="table longPath mt-1">
                <thead>
                    <tr>
                        <th class="text-center" scope="col" style="width: 15%">Документы для УКК</th>
                        <th class="text-center" scope="col" style="width: 15%">Документы для ЗС</th>
                        <th class="text-center" scope="col" style="width: 15%">Документы для ПД</th>
                        <th class="text-center" scope="col" style="width: 15%">Документы для ИАБ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">{{$loan->pathUKK}}</td>
                        <td class="text-center">{{$loan->pathZS}}</td>
                        <td class="text-center">{{$loan->pathPD}}</td>
                        <td class="text-center">{{$loan->pathIAB}}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ URL::previous() }}"> <i class="far fa-arrow-alt-circle-left"></i></a>
        </div>
    </div>
</div>
@endsection
