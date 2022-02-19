<form action="{{route('loans.kk')}}" method="post">
    @csrf
    <input type="text" hidden name='loan_id' value="{{$loan->id}}">
    <input type="text" value="" name="conclusion" placeholder="Введите путь">
    <button type="submit" class="btn-primary">
        на КК
    </button>
</form>
