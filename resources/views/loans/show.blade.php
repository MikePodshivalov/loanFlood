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
                            <form action="{{route('executor.update')}}" method="post">
                                @csrf
                                <select class="form-select text-center" id="option-km" name="km" onchange="this.form.submit()">
                                    @foreach($listOfUserRole['km'] as $user)
                                        <option class="text-center" value="{{$user}}" {{$loan->executors->km == $user ? "selected" : ""}}>{{$user}}</option>
                                    @endforeach
                                    @if($loan->executors->km === null)
                                        <option class="text-center" value="" selected>...</option>
                                    @endif
                                </select>
                                <input type="text" name="id" value="{{$loan->id}}" hidden>
                            </form>
                        @else
                            {{ $loan->executors->km ?? '' }}
                        @endif
                    </td>
                    <td class="text-center">
                        @if(Auth::user()->hasRole('ukk_main'))
                            <form action="{{route('executor.update')}}" method="post">
                                @csrf
                                <select class="form-select text-center" id="option-ukk" name="ukk" onchange="this.form.submit()">
                                    @foreach($listOfUserRole['ukk'] as $user)
                                        <option class="text-center" value="{{$user}}" {{$loan->executors->ukk == $user ? "selected" : ""}}>{{$user}}</option>
                                    @endforeach
                                    @if($loan->executors->ukk === null)
                                        <option class="text-center" value="" selected>...</option>
                                    @endif
                                </select>
                                <input type="text" name="id" value="{{$loan->id}}" hidden>
                            </form>
                        @else
                            {{ $loan->executors->ukk ?? '' }}
                        @endif
                    </td>
                    <td class="text-center">
                        @if(Auth::user()->hasRole('zs_main'))
                            <form action="{{route('executor.update')}}" method="post">
                                @csrf
                                <select class="form-select text-center" id="option-zs" name="zs" onchange="this.form.submit()">
                                    @foreach($listOfUserRole['zs'] as $user)
                                        <option class="text-center" value="{{$user}}" {{$loan->executors->zs == $user ? "selected" : ""}}>{{$user}}</option>
                                    @endforeach
                                    @if($loan->executors->zs === null)
                                        <option class="text-center" value="" selected>...</option>
                                    @endif
                                </select>
                                <input type="text" name="id" value="{{$loan->id}}" hidden>
                            </form>
                        @else
                            {{ $loan->executors->zs ?? '' }}
                        @endif
                    </td>
                    <td class="text-center">
                        @if(Auth::user()->hasRole('pd_main'))
                            <form action="{{route('executor.update')}}" method="post">
                                @csrf
                                <select class="form-select text-center" id="option-pd" name="pd" onchange="this.form.submit()">
                                    @foreach($listOfUserRole['pd'] as $user)
                                        <option class="text-center" value="{{$user}}" {{$loan->executors->pd == $user ? "selected" : ""}}>{{$user}}</option>
                                    @endforeach
                                    @if($loan->executors->pd === null)
                                        <option class="text-center" value="" selected>...</option>
                                    @endif
                                </select>
                                <input type="text" name="id" value="{{$loan->id}}" hidden>
                            </form>
                        @else
                            {{ $loan->executors->pd ?? '' }}
                        @endif
                    </td>
                    <td class="text-center">
                        @if(Auth::user()->hasRole('iab_main'))
                            <form action="{{route('executor.update')}}" method="post">
                                @csrf
                                <select class="form-select text-center" id="option-iab" name="iab" onchange="this.form.submit()">
                                    @foreach($listOfUserRole['iab'] as $user)
                                        <option class="text-center" value="{{$user}}" {{$loan->executors->iab == $user ? "selected" : ""}}>{{$user}}</option>
                                    @endforeach
                                    @if($loan->executors->iab === null)
                                            <option class="text-center" value="" selected>...</option>
                                    @endif
                                </select>
                                <input type="text" name="id" value="{{$loan->id}}" hidden>
                            </form>
                        @else
                            {{ $loan->executors->iab ?? '' }}
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
            <a href="{{ URL::previous() }}"> Назад </a>
        </div>
    </div>
</div>
@endsection
