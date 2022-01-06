@php
    $tags = $tags ?? collect();
@endphp
@if($tags->isNotEmpty())
    <div>
        @foreach($tags as $tag)
            @if(!empty($tag->name))
                <a href="{{ route('loans.tag', $tag) }}" class="badge badge bg-info "> {{ $tag->name }} </a>
            @endif
        @endforeach
    </div>
@endif
