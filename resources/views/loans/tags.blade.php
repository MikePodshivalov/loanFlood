@php
    $tags = $tags ?? collect();
@endphp
@if($tags->isNotEmpty())
    <div>
        @foreach($tags as $tag)
            <a href="{{ route('loans.tag', $tag) }}" class="badge badge bg-info "> {{ $tag->name }} </a>
        @endforeach
    </div>
@endif
