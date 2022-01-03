<form action="{{route('loans.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row push">
        <div class="col-xl-8">

            <div class="mb-3">
                <label class="form-label" for="text-name">Краткое наименование заемщика<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="text-name" value="{{old('name')}}" name="name" placeholder="Наименование заемщика" required>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="text-group">Группа компаний</label>
                <input type="text" class="form-control @error('group') is-invalid @enderror" id="text-group" value="{{old('group')}}" name="group" placeholder="Группа компаний">
                @error('group')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="text-inn">ИНН<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('inn') is-invalid @enderror" id="text-inn" value="{{old('inn')}}" name="inn" placeholder="ИНН" required>
                @error('inn')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="option-type">Тип кредитного продукта<span class="text-danger">*</span></label>
                <select class="form-select @error('type') is-invalid @enderror" id="option-type" name="type" required>
                    <option value="ВКЛ" {{old('type') == 'ВКЛ' ? "selected" : ""}}>ВКЛ</option>
                    <option value="НКЛ" {{old('type') == 'НКЛ' ? "selected" : ""}}>НКЛ</option>
                    <option value="БГ" {{old('type') == 'БГ' ? "selected" : ""}}>БГ</option>
                    <option value="ЛБГ" {{old('type') == 'ЛБГ' ? "selected" : ""}}>ЛБГ</option>
                    <option value="Разное" {{old('type') == 'Разное' ? "selected" : ""}}>Разное</option>
                </select>
                @error('type')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label @error('amount') is-invalid @enderror" for="text-amount">Сумма, млн.руб.</label>
                <input type="text" class="form-control" id="text-amount" name="amount" placeholder="Введите сумму">
                @error('amount')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input id="checkbox-pledge" class="checkbox form-check-input" type="checkbox" name="pledge"/>
                <label class="form-check-label" for="checkbox-pledge">Необходимо заключение Залоговой службы</label>
                <div class="mb-4" id="path-zs" style="display: none">
                    <input type="text" class="form-control" id="text-path-zs" name="path-zs" placeholder="Введите путь к файлам для залоговой службы">
                </div>
            </div>
            <div class="mb-3 form-check">
                <input id="checkbox-pd" class="checkbox form-check-input" type="checkbox" name="pd"/>
                <label for="checkbox-pd">Необходимо заключение Правового департамента на сделку</label>
                <div class="mb-4" id="path-pd" style="display: none">
                    <input type="text" class="form-control" id="text-path-pd" name="path-pd" placeholder="Введите путь к файлам для правового департамента">
                </div>
            </div>

            <div class="mb-3" style="display: none">
                <input type="text" name="creator" value="{{Auth::user()->name}}" required>
            </div>

            <div class="mb-4">
                <label for="text-tags">Теги</label>
                <input type="text" id="text-tags" class="form-control @error('tags') is-invalid @enderror" name="tags" placeholder="Теги через запятую без пробелов">
                @error('tags')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <textarea rows="4" class="form-control @error('description') is-invalid @enderror" id="text-description" placeholder="Дополнительная информация по заявке" name="description"></textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <button type="submit" class="btn btn-hero btn-success" name="submit">Отправить</button>
            </div>
        </div>
    </div>
</form>
@push('scripts')
    <script>
        $('#checkbox-pledge').click(function(){
            if ($(this).is(':checked')){
                $('#path-zs').show(100);
            } else {
                $('#path-zs').hide(100);
                $('#text-path-zs').val('');
            }
        });
        $('#checkbox-pd').click(function(){
            if ($(this).is(':checked')){
                $('#path-pd').show(100);
            } else {
                $('#path-pd').hide(100);
                $('#text-path-pd').val('');
            }
        });
    </script>
@endpush
