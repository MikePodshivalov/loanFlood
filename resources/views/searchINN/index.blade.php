@extends('layouts.backend')
@section('content')
    <div class="row push block-content mt-6">
        <div class="col-xl-8">
            <div class="mb-2">
                <form action="{{ route('searchINN.index') }}" method="post" class="form-control">
                    @csrf
                    <label class="form-label" for="text-input">Введите ИНН для поиска</label>
                    <input type="text" class="form-control" id="text-input" name="inn" placeholder="ИНН">
                    <button type="submit" class="btn-primary mt-3">Поиск</button>
                </form>
            </div>
        </div>
        @if(isset($result) && !empty($result))
            <div class="mb-2">
                <p class="mb-0">{{$result[0]['data']['name']['full_with_opf']}}</p>
                <p class="mb-0">{{$result[0]['data']['name']['short_with_opf']}}</p>
                <p class="mb-0">Статус: {{$result[0]['data']['state']['status']}}</p>
                <p class="mb-0">ОГРН {{$result[0]['data']['ogrn']}}</p>
                <p class="mb-0">ИНН {{$result[0]['data']['inn']}}, КПП {{$result[0]['data']['kpp']}}</p>
                <p class="mb-0">ОКПО {{$result[0]['data']['okpo']}}, ОКАТО {{$result[0]['data']['okato']}}</p>
                <p class="mb-0">{{$result[0]['data']['address']['value']}}, КПП {{$result[0]['data']['kpp']}}</p>
                <p class="mb-0">{{$result[0]['data']['management']['post']}} {{$result[0]['data']['management']['name']}}</p>
            </div>
        @endif
    </div>
@endsection
