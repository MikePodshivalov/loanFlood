<form action="{{ route('loans.update', $loan) }}" method="POST">
    @method('PATCH')
    @csrf
    <div class="row push">
        <div class="col-xl-8">

            <div class="mb-3">
                <label class="form-label" for="text-name">Краткое наименование заемщика<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="text-name" value="{{old('name', $loan->name ?? '')}}" name="name" placeholder="Наименование заемщика" required>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="text-group">Группа компаний</label>
                <input type="text" class="form-control @error('group') is-invalid @enderror" id="text-group" value="{{old('group', $loan->group ?? '')}}" name="group" placeholder="Группа компаний">
                @error('group')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="text-initiator">Инициатор<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('initiator') is-invalid @enderror" id="text-initiator" value="{{old('initiator', $loan->initiator ?? '')}}" name="initiator" placeholder="Инициатор" required>
                @error('initiator')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="option-type">Тип кредитного продукта<span class="text-danger">*</span></label>
                <select class="form-select @error('type') is-invalid @enderror" id="option-type" name="type" required>
                    @foreach(config('loanproduct') as $type)
                        <option value="{{$type}}" {{old('type', $loan->type ?? '') == $type ? "selected" : ""}}>{{$type}}</option>
                    @endforeach
                </select>
                @error('type')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label @error('amount') is-invalid @enderror" for="text-amount">Сумма, млн.руб.</label>
                <input type="text" class="form-control" id="text-amount" value="{{old('amount', $loan->amount ?? '')}}" name="amount" placeholder="Введите сумму">
                @error('amount')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input id="checkbox-ukk" class="checkbox form-check-input" type="checkbox" name="ukk"
                    @if(old('ukk', $loan->ukk ?? ''))
                       checked
                    @endif
                />
                <label for="checkbox-ukk">УКК</label>
                <div class="mb-4" id="path-ukk" style="display: block">
                    <input type="text" class="form-control" id="text-path-ukk" value="{{old('pathUKK', $loan->pathUKK ?? '')}}" name="pathUKK" placeholder="Введите путь к файлам для УКК">
                </div>
            </div>

            <div class="mb-3 form-check">
                <input id="checkbox-zs" class="checkbox form-check-input" type="checkbox" name="zs"
                    @if(old('ukk', $loan->zs ?? ''))
                       checked
                    @endif
                />
                <label class="form-check-label" for="checkbox-zs">ЗС</label>
                <div class="mb-4" id="path-zs" style="display: block">
                    <input type="text" class="form-control" id="text-path-zs" value="{{old('pathZS', $loan->pathZS ?? '')}}" name="pathZS" placeholder="Введите путь к файлам для ЗС">
                </div>
            </div>

            <div class="mb-3 form-check">
                <input id="checkbox-pd" class="checkbox form-check-input" type="checkbox" name="pd"
                    @if(old('ukk', $loan->pd ?? ''))
                       checked
                    @endif
                />
                <label for="checkbox-pd">ПД</label>
                <div class="mb-4" id="path-pd" style="display: block">
                    <input type="text" class="form-control" id="text-path-pd" value="{{old('pathPD', $loan->pathPD ?? '')}}" name="pathPD" placeholder="Введите путь к файлам для ПД">
                </div>
            </div>

            <div class="mb-3 form-check">
                <input id="checkbox-iab" class="checkbox form-check-input" type="checkbox" name="iab"
                    @if(old('ukk', $loan->iab ?? ''))
                       checked
                    @endif
                />
                <label for="checkbox-iab">ИАБ</label>
                <div class="mb-4" id="path-iab" style="display: block">
                    <input type="text" class="form-control" id="text-path-iab" name="pathIAB" value="{{old('pathIAB', $loan->pathIAB ?? '')}}" placeholder="Введите путь к файлам для ИАБ">
                </div>
            </div>

            <div class="mb-4">
                <label for="text-tags">Теги</label>
                <input type="text" id="text-tags" class="form-control" value="{{ old('tags', isset($loan->tags) ? $loan->tags->pluck('name')->implode(',') : '') }}" name="tags" placeholder="Теги через запятую без пробелов">
            </div>

            <div class="mb-4">
                <textarea rows="4" class="form-control" placeholder="Дополнительная информация по заявке" name="description">{{old('description', $loan->description ?? '')}}</textarea>
            </div>

            <div class="mb-4">
                <button type="submit" class="btn btn-hero btn-success" name="submit">Изменить</button>
            </div>
        </div>
    </div>
</form>
@push('scripts')
    <script>
        function showDivWithPath(name) {
            $('#checkbox-' + name).click(function(){
                if ($(this).is(':checked')){
                    $('#path-' + name).show(100);
                } else {
                    $('#path-' + name).hide(100);
                }
            });
        }
        showDivWithPath('zs');
        showDivWithPath('pd');
        showDivWithPath('ukk');
        showDivWithPath('iab');
    </script>
@endpush
