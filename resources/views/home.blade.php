@extends('layouts.backend')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                <button class="btn-hero btn-success" onclick="window.location='{{route('loans.create')}}'">
                    Создать новую заявку
                </button>
            </div>
        </div>
    </div>
@endsection

