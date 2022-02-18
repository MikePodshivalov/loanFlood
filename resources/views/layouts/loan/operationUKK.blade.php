
@if($loan->operations->count() === 0)
    <form action="{{route('operations.storeDefaultOperationsUKK')}}" method="post">
        @csrf
        <button type="submit" name="loan" value="{{$loan->id}}" class="btn btn-warning" style="font-size: small;">Создать стандартные шаги УКК</button>
    </form>
@else
    @foreach($loan->operations as $operation)
        @if($operation->department == 'ukk')
            <li style="font-size: small; list-style-type: none;">
                <form action="{{route('operations.done')}}" id="operation-{{$operation->id}}" method="post">
                    @csrf
                    <input type="text" name="id" value="{{$operation->id}}" hidden>
                    <a style="font-size: xx-small;" href="#" onclick="document.getElementById('operation-{{$operation->id}}').submit();">
                        {{$operation->name}}
                    </a>
                </form>
            </li>
        @endif
    @endforeach
    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('ukk'))
        <form action="{{route('operations.store')}}" method="post">
            @csrf
            <div class="input-group">
                <input class="form-control width100" type="text" name="name">
                <input hidden type="text" name="loan_id" value="{{$loan->id}}">
                <span class="input-group-btn">
                    <button type="submit" name="department" value="ukk" class="btn btn-primary" style="font-size: small;">Создать</button>
                </span>
            </div>
        </form>
    @endif
@endif



