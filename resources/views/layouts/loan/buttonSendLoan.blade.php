<form action="{{route('executor.sendLoanToDepartments')}}" method="post">
    @csrf
    <input type="text" hidden name='loan_id' value="{{$loan->id}}">
    <button type="submit" class="btn-primary">
        Отправить задачу в другие подразделения
    </button>
</form>
