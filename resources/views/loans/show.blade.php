@extends('layouts.backend')
@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-content block-content-full">
            <h3>{{$loan->name}}</h3>
            <a href="{{ URL::previous() }}">Назад</a>
        </div>

    </div>
</div>
@endsection
