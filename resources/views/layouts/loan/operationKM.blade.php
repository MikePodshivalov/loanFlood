@foreach($loan->operations as $operation)
    @if($operation->department == 'km')
        <li style="font-size: small; list-style-type: none;">
            {{$operation->name}}
        </li>
    @endif
@endforeach
@if(\Illuminate\Support\Facades\Auth::user()->hasRole('km'))
    <form action="{{route('operations.store')}}" method="post">
        @csrf
        <div class="input-group">
            <input class="form-control width100" type="text" name="name">
            <input hidden type="text" name="loan_id" value="{{$loan->id}}">
            <span class="input-group-btn">
                    <button type="submit" name="department" value="km" class="btn btn-primary" style="font-size: small;">Создать</button>
            </span>
        </div>
    </form>
@endif
