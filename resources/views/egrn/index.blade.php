<link rel="stylesheet" href="{{ asset("js/myJS.js") }}">
@extends('layouts.backend')
@section('content')
    <div class="content content-full content-boxed mt-6">
        <div class="row">
            <form action="{{route('Egrn')}}" enctype="multipart/form-data" method="post">
                @csrf
                <input type="file" name="files[]" multiple>
                <button type="submit" value="submit">Загрузить</button>
            </form>
        </div>
    </div>
@endsection
