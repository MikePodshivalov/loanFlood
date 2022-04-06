@component('mail::message')
# Создана новая заявка №{{$loan->id}}

<h3>Параметры заявки:</h3>
<p>Заемщик/Принципал: {{$loan->name}}</p>
<p>Тип заявки: {{$loan->type}}</p>
@if($loan->amount)
    <p>Сумма: {{$loan->amount}} млн.руб.</p>
@endif
<p>Создатель заявки: {{$loan->creator}}</p>
@if($loan->description)
    <p>Описание: {{$loan->description}}</p>
@endif

@component('mail::button', ['url' => env('APP_URL') . '/loans/' . $loan->id])
К заявке
@endcomponent

С уважением,<br>
{{ config('app.name') }}
@endcomponent
