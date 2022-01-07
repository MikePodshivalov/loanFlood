@include('layouts.header')
    <div class="p-3 w-100 mt-9">
        <div class="mb-3 text-center">
            <a class="link-fx fw-bold fs-1" href="#">
                <span class="text-dark">Loan</span><span class="text-primary">Flow</span>
            </a>
        </div>

        <div class="row g-0 justify-content-center">
            <div class="col-xl-3">
               <form class="js-validation-signin" action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="py-3">
                        <div class="mb-4">
                            <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" id="login-username" value="{{old('email')}}" name="email" placeholder="Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="login-password" value="{{old('password')}}" name="password" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn w-100 btn-lg btn-hero btn-primary">
                            <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Войти
                        </button>
                        <div class="mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Запомнить меня
                                    </label>
                                </div>
                        </div>
                        <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                            <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="{{route('password.request')}}">
                                <i class="fa opacity-50 "></i> Забыли пароль
                            </a>
                            <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="{{route('register')}}">
                                <i class="fa opacity-50 "></i> Зарегистрироваться
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>



