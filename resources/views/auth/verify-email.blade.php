@include('layouts.header')

    <div class="container mt-9">
        <div class="mb-0">
            <p>Для подтверждения электронной почты, нажмите на кнопку ниже и перейдите по ссылке, которая будет
                отправлена на Ваш адрес электронной почты.</p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                Новая ссылка для подтверждения электронной почты успешно отправлена Вам на почту!
            </div>
        @endif

        <form class="mb-4" method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button class="btn-primary" type="submit">
                {{ __('Resend Verification Email') }}
            </button>
        </form>

        <form class="mb-4" method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn-primary" type="submit">
                {{ __('Logout') }}
            </button>
        </form>
    </div>
