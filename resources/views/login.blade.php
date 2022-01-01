@include('layouts.header')
    <div class="p-3 w-100 mt-9">
        <div class="mb-3 text-center">
            <a class="link-fx fw-bold fs-1" href="#">
                <span class="text-dark">Loan</span><span class="text-primary">Flow</span>
            </a>
        </div>
        <div class="row g-0 justify-content-center">
            <div class="col-xl-3">
                <form class="js-validation-signin" action="#" method="POST">
                    <div class="py-3">
                        <div class="mb-4">
                            <input type="email" class="form-control form-control-lg" id="login-username" name="login-username" placeholder="Email">
                        </div>
                        <div class="mb-4">
                            <input type="password" class="form-control form-control-lg" id="login-password" name="login-password" placeholder="Password">
                        </div>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn w-100 btn-lg btn-hero btn-primary">
                            <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Войти
                        </button>
                        <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                            <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="#">
                                <i class="fa fa-exclamation-triangle opacity-50 me-1"></i> Забыли пароль
                            </a>
                            <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="{{route('register')}}">
                                <i class="fa fa-plus opacity-50 me-1"></i> Зарегистрироваться
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>



