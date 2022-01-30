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
                    <th class="text-center" scope="col" style="width: 160px">Группа</th>
                    <th class="text-center" scope="col">Инициатор</th>
                    <th class="text-center" scope="col" style="width: 100px">Млн.руб.</th>
                    <th class="text-center" scope="col">Кем создана</th>
                    <th class="text-center" scope="col" style="width: 150px">Дата создания</th>
                    <th class="text-center" scope="col">Закл. ЗС</th>
                    <th class="text-center" scope="col">Закл. ПД</th>
                    <th class="text-center" scope="col">Закл. ИАБ</th>
                    <th class="text-center" scope="col" style="width: 80px">КСОВ</th>
                    <th class="text-center" scope="col" style="width: 80px">КК</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center">{{$loan->id}}</td>
                    <td class="text-center">{{$loan->group}}</td>
                    <td class="text-center">{{$loan->initiator}}</td>
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
            @if(!empty($loan->description))
                <h4 class="display-8 mb-0 text-center mt-1">Описание: </h4>
                <div class="border border-secondary">
                    <p class="m-lg-1">{{$loan->description}}</p>
                </div>
            @endif
            <h4 class="display-8 mb-1 text-center">Документы для работы: </h4>
            <table id="path-table" class="table longPath mt-1">
                <thead>
                    <tr>
                        <th class="text-center" scope="col" style="width: 15%">Путь для УКК</th>
                        <th class="text-center" scope="col" style="width: 15%">Путь для ЗС</th>
                        <th class="text-center" scope="col" style="width: 15%">Путь для ПД</th>
                        <th class="text-center" scope="col" style="width: 15%">Путь для ИАБ</th>
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
            <h4 class="display-8 mb-0 text-center mt-1">Исполнители: </h4>
            <table id="path-table" class="table longPath mt-0">
                <thead>
                <tr>
                    <th class="text-center" style="width: 15%">От ДКБ</th>
                    <th class="text-center" style="width: 15%">От УКК</th>
                    <th class="text-center" style="width: 15%">От ЗС</th>
                    <th class="text-center" style="width: 15%">От ПД</th>
                    <th class="text-center" style="width: 15%">От ИАБ</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center">
                        @if(Auth::user()->hasRole('km_main'))
                            <select class="form-select" id="option-km" name="km" required>
                                @foreach($listOfUserRole['km'] as $user)
                                    <option value="{{$user}}" {{old('type') == $type ? "selected" : ""}}>{{$type}}</option>
                                @endforeach
                            </select>
                        @else
                            {{ $loan->executors->km ?? '' }}
                        @endif
                    </td>

                    <td class="text-center">{{ $loan->executors->ukk ?? '' }}</td>
                    <td class="text-center">{{ $loan->executors->zs ?? '' }}</td>
                    <td class="text-center">{{ $loan->executors->pd ?? '' }}</td>
                    <td class="text-center">{{ $loan->executors->iab ?? '' }}</td>
                </tr>
                </tbody>
            </table>
            <h1>sdfksdf</h1>
            <a href="{{ URL::previous() }}"> Назад </a>
        </div>
    </div>
</div>
@endsection
