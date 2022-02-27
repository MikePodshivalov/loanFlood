<link rel="stylesheet" href="{{ asset("css/my.css") }}">
<link rel="stylesheet" id="css-main" href="{{ mix('css/dashmix.css') }}">
@extends('layouts.backend')
@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-content block-content-full">

            <div class="row">
                <div class="col-sm-4">
                    <h4 class="mb-0 display-9"><b>{{$loan->name}} ({{$loan->type}})</b></h4>
                </div>
                @if(Auth::user()->hasRole('ukk_main'))

                        <form class="form-inline col-sm-3" action="{{route('difficulty.update')}}" method="post">
                            @csrf
                            <div class="col-sm-4">
                                <select class="form-select" id="difficulty" name="difficulty" onchange="this.form.submit()">
                                    @for($i = 1; $i <= 5; $i++)
                                        <option class="text-center" value="{{$i}}" {{$loan->difficulties->difficulty == $i ? "selected" : ""}}>{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            <input type="text" name="id" value="{{$loan->id}}" hidden>
                        </form>
                @endif

                @if(Auth::user()->hasAnyRole('ukk_main', 'km_main'))
                    <div class="col-4">
                        <form class="form-inline col-5" action="{{route('status.update')}}" method="post">
                            @csrf
                            <select class="form-select" id="special_status" name="special_status" onchange="this.form.submit()">
                                    @foreach(config('specialstatus') as $status)
                                        <option value="{{$status}}" {{$loan->statuses->special_status == $status ? "selected" : ""}}>{{$status}}</option>
                                    @endforeach
                                </select>
                            <input type="text" name="id" value="{{$loan->id}}" hidden>
                        </form>
                    </div>
                @endif

            </div>

            @include('loans.tags', ['tags' => $loan->tags])
            <table class="table longPath">
                <thead>
                <tr>
                    <th class="text-center" scope="col" style="width: 60px">ID</th>
                    <th class="text-center" scope="col" style="width: 160px">Группа</th>
                    <th class="text-center" scope="col">Инициатор</th>
                    <th class="text-center" scope="col" style="width: 100px">Млн.руб.</th>
{{--                    <th class="text-center" scope="col">Кем создана</th>--}}
{{--                    <th class="text-center" scope="col" style="width: 150px">Дата создания</th>--}}
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
                    <td class="text-center">{{$loan->initiator}}</td>
                    <td class="text-center">{{number_format($loan->amount, 0, ' ', ' ')}}</td>
{{--                    <td class="text-center">{{$loan->creator}}</td>--}}
{{--                    <td class="text-center">{{date('d-m-Y', strtotime($loan->created_at))}}</td>--}}
                    <td class="text-center longPathTd">
                        @if($loan->conclusionZS)
                            <button style="font-size: x-small" id="conclusionZS" value="{{$loan->conclusionZS}}" class="btn-outline-primary"
                                    onclick="copyPathToBuffer(document.getElementById('conclusionZS').value)">
                                Скопировать
                            </button>
                        @endif
                    </td>
                    <td class="text-center longPathTd">
                        @if($loan->conclusionPD)
                            <button style="font-size: x-small" id="conclusionPD" value="{{$loan->conclusionPD}}" class="btn-outline-primary"
                                    onclick="copyPathToBuffer(document.getElementById('conclusionPD').value)">
                                Скопировать
                            </button>
                        @endif
                    </td>
                    <td class="text-center longPathTd">
                        @if($loan->conclusionIAB)
                            <button style="font-size: x-small" id="conclusionIAB" value="{{$loan->conclusionIAB}}" class="btn-outline-primary"
                                    onclick="copyPathToBuffer(document.getElementById('conclusionIAB').value)">
                                Скопировать
                            </button>
                        @endif
                    </td>
                    <td class="text-center longPathTd">
                        @if($loan->KSOV)
                            <button style="font-size: x-small" id="KSOV" value="{{$loan->KSOV}}" class="btn-outline-primary"
                                    onclick="copyPathToBuffer(document.getElementById('KSOV').value)">
                                Скопировать
                            </button>
                        @endif
                    </td>
                    <td class="text-center longPathTd">
                        @if($loan->KK)
                            <button style="font-size: x-small" id="KK" value="{{$loan->KK}}" class="btn-outline-primary"
                                    onclick="copyPathToBuffer(document.getElementById('KK').value)">
                                Скопировать
                            </button>
                        @endif
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
            <hr>
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
                        <td class="text-center">
                            @if($loan->pathUKK)
                                <button style="font-size: x-small" id="pathUKK" value="{{$loan->pathUKK}}" class="btn-outline-primary"
                                        onclick="copyPathToBuffer(document.getElementById('pathUKK').value)">
                                    Скопировать
                                </button>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($loan->pathZS)
                                <button style="font-size: x-small" id="pathZS" value="{{$loan->pathZS}}" class="btn-outline-primary"
                                        onclick="copyPathToBuffer(document.getElementById('pathZS').value)">
                                    Скопировать
                                </button>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($loan->pathPD)
                                <button style="font-size: x-small" id="pathPD" value="{{$loan->pathPD}}" class="btn-outline-primary"
                                        onclick="copyPathToBuffer(document.getElementById('pathPD').value)">
                                    Скопировать
                                </button>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($loan->pathIAB)
                                <button style="font-size: x-small" id="pathIAB" value="{{$loan->pathIAB}}" class="btn-outline-primary"
                                        onclick="copyPathToBuffer(document.getElementById('pathIAB').value)">
                                    Скопировать
                                </button>
                            @endif
                        </td>
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
                            {{ $loan->executors->km ?? '' }}<br>
                        @endif
                        <span style="font-size: small">
                            {{$loan->executors->km_start !== null ? \App\Services\Helper::ReverseDate($loan->executors->km_start) : ''}}
                            {{$loan->executors->km_end !== null ? '-' . \App\Services\Helper::ReverseDate($loan->executors->km_end) : ''}}
                        </span>
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
                            {{ $loan->executors->ukk ?? '' }}<br>
                        @endif
                        <span style="font-size: small">
                            {{$loan->executors->ukk_start !== null ? \App\Services\Helper::ReverseDate($loan->executors->ukk_start) : ''}}
                            {{$loan->executors->ukk_end !== null ? '-' . \App\Services\Helper::ReverseDate($loan->executors->ukk_end) : ''}}
                        </span>
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
                            {{ $loan->executors->zs ?? '' }}<br>
                        @endif
                        <span style="font-size: small">
                            {{$loan->executors->zs_start !== null ? \App\Services\Helper::ReverseDate($loan->executors->zs_start) : ''}}
                            {{$loan->executors->zs_end !== null ? '-' . \App\Services\Helper::ReverseDate($loan->executors->zs_end) : ''}}
                        </span>
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
                            {{ $loan->executors->pd ?? '' }}<br>
                        @endif
                        <span style="font-size: small">
                            {{$loan->executors->pd_start !== null ? \App\Services\Helper::ReverseDate($loan->executors->pd_start) : ''}}
                            {{$loan->executors->pd_end !== null ? '-' . \App\Services\Helper::ReverseDate($loan->executors->pd_end) : ''}}
                        </span>
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
                            {{ $loan->executors->iab ?? '' }}<br>
                        @endif
                        <span style="font-size: small">
                            {{$loan->executors->iab_start !== null ? \App\Services\Helper::ReverseDate($loan->executors->iab_start) : ''}}
                            {{$loan->executors->iab_end !== null ? '-' . \App\Services\Helper::ReverseDate($loan->executors->iab_end) : ''}}
                        </span>

                    </td>
                </tr>
                <tr>
                    <td class="text-left">
                        @include('operations.index', ['column' => 'km'])
                    </td>
                    <td class="text-left">
                        @include('operations.index', ['column' => 'ukk'])
                    </td>
                    <td class="text-left">
                        @include('operations.index', ['column' => 'zs'])
                    </td>
                    <td class="text-left">
                        @include('operations.index', ['column' => 'pd'])
                    </td>
                    <td class="text-left">
                        @include('operations.index', ['column' => 'iab'])
                    </td>
                </tr>
                </tbody>
            </table>
            @if(is_null($loan->executors->published) && Auth::user()->hasRole('km_main'))
                @include('layouts.loan.buttonSendLoan')
            @endif
            @if(($executorRole === 'IAB' && !$loan->executors->iab_end) || ($executorRole === 'ZS' && !$loan->executors->zs_end) || ($executorRole === 'PD' && !$loan->executors->pd_end))
                @include('conclusions.conclusions')
            @endif
            @if($executorRole === 'UKK' && !$loan->KSOV && !$loan->KK)
                @include('conclusions.KSOV')
            @endif
            @if($executorRole === 'UKK' && !$loan->KK)
                @include('conclusions.KK')
            @endif
            @if(Auth::user()->hasAnyRole('km_main', 'ukk_main', 'iab_main', 'pd_main', 'zs_main'))
                <a href="{{ route('loans.index') }}"> Назад </a>
            @elseif(Auth::user()->hasAnyRole('km', 'ukk', 'iab', 'pd', 'zs'))
                <a href="{{ route('loans.homeIndex') }}"> Назад </a>
            @else
                <a href="{{ URL::previous() }}"> Назад </a>
            @endif
        </div>
    </div>
</div>
@endsection
<script type="text/javascript" src="{{ asset("/js/myJS.js") }}"></script>
