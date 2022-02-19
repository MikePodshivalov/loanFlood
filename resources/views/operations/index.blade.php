@if($loan->operations->whereIn('department', 'ukk')->isEmpty() && \Illuminate\Support\Facades\Auth::user()->hasRole('ukk') && $column === 'ukk')
    <form action="{{route('operations.storeDefaultOperationsUKK')}}" method="post">
        @csrf
        <button type="submit" name="loan" value="{{$loan->id}}" class="btn btn-warning" style="font-size: small;">Создать стандартные шаги УКК</button>
    </form>
@endif
@foreach($loan->operations as $operation)
    @if($operation->department == $column)
        <li style="font-size: small; list-style-type: none;">
            <form class="operations" action="{{route('operations.done')}}" id="operation-{{$operation->id}}" method="post">
                @csrf
                <input type="text" name="id" value="{{$operation->id}}" hidden>
                <input type="text" name="done" value="{{$operation->done}}" hidden>
                <a style="font-size: x-small;
                @if($operation->done)
                    text-decoration: line-through;"
                @endif
                   href="#"
                   @if(\Illuminate\Support\Facades\Auth::user()->hasRole($column))
                        onclick="document.getElementById('operation-{{$operation->id}}').submit();
                   @endif
                       ">
                    {{Str::limit($operation->name, 17)}}
                </a>
                @if($operation->done)
                    <a href="#" style="font-size: x-small;">{{\App\Services\Helper::ReverseDate($operation->done_time)}}</a>
                @endif
            </form>
            @if(\Illuminate\Support\Facades\Auth::user()->hasAnyRole($column . '_main', 'admin'))
                <form class="operations" action="{{route('operations.destroy')}}" method="post" id="operation-delete-{{$operation->id}}">
                    @csrf
                    @method('DELETE')
                    <a style="font-size: xx-small;" href="#" onclick="document.getElementById('operation-delete-{{$operation->id}}').submit();">
                        <input type="hidden" name="operation_id" value="{{$operation->id}}">
                        <i class="far fa-window-close"></i>
                    </a>
                </form>
            @endif
        </li>
    @endif
@endforeach
@if(\Illuminate\Support\Facades\Auth::user()->hasRole($column))
    <form action="{{route('operations.store')}}" method="post">
        @csrf
        <div class="input-group">
            <input class="form-control width100 small" type="text" name="name">
            <input hidden type="text" name="loan_id" value="{{$loan->id}}">
            <span class="input-group-btn">
                <button type="submit" name="department" value="{{$column}}" class="btn btn-primary small" style="font-size: small;">Создать</button>
            </span>
        </div>
    </form>
@endif

