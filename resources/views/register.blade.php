@include('layouts.header')
    <div class="p-3 w-100 mt-8">
        <div class="mb-3 text-center">
            <a class="link-fx fw-bold fs-1" href="#">
                <span class="text-dark">Loan</span><span class="text-primary">Flow</span>
            </a>
            <p class="text-uppercase fw-bold fs-sm text-muted">Регистрация нового пользователя</p>
        </div>
        <div class="row g-0 justify-content-center">
            <div class="col-sm-8 col-xl-3">
                <form class="js-validation-signup" action="#" method="POST" novalidate="novalidate">
                    <div class="py-3">
                        <div class="mb-4">
                            <input type="text" class="form-control form-control-lg" id="signup-username" name="signup-username" placeholder="Имя+Фамилия">
                        </div>
                        <div class="mb-4">
                            <input type="email" class="form-control form-control-lg" id="signup-email" name="signup-email" placeholder="Email">
                        </div>
                        <div class="mb-4">
                            <input type="password" class="form-control form-control-lg" id="signup-password" name="signup-password" placeholder="Password">
                        </div>
                        <div class="mb-4">
                            <input type="password" class="form-control form-control-lg" id="signup-password-confirm" name="signup-password-confirm" placeholder="Password Confirm">
                        </div>

                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn w-100 btn-lg btn-hero btn-primary">
                            <i class="fa fa-fw fa-plus opacity-50 me-1"></i> Зарегистрироваться
                        </button>
                        <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                            <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="{{route('login')}}">
                                <i class="fa fa-sign-in-alt opacity-50 me-1"></i> Войти
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

