<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="bg-header-dark">
        <div class="content-header bg-white-5">
            <!-- Logo -->
            <a class="fw-semibold text-white tracking-wide" href="{{route('home')}}">
                <span class="smini-hidden">
                  Loan<span class="opacity-75">Flow</span>
                </span>
            </a>
            <!-- END Logo -->

            <!-- Options -->
            <div>

                <!-- Dark Mode -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
{{--                <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#dark-mode-toggler" data-class="far fa" onclick="Dashmix.layout('dark_mode_toggle');">--}}
{{--                    <i class="far fa-moon" id="dark-mode-toggler"></i>--}}
{{--                </button>--}}
                <!-- END Dark Mode -->

                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times-circle"></i>
                </button>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                @if(Auth::user()->hasAnyRole('ukk', 'km', 'pd', 'zs', 'iab'))
                    <li class="nav-main-item">
                        <a class="nav-main-link{{Route::currentRouteName() === 'loans.homeIndex' ? ' active' : '' }}" href="{{route('loans.homeIndex')}}">
                            <span class="nav-main-link-name">Мои задачи</span>
    {{--                        <span class="nav-main-link-badge badge rounded-pill bg-primary">5</span>--}}
                        </a>
                    </li>
                @endif
                @if(Auth::user()->hasAnyRole('ukk_main', 'km_main', 'pd_main', 'zs_main', 'iab_main'))
                    <li class="nav-main-item">
                        <a class="nav-main-link{{str_contains(Route::currentRouteName(), 'loans.index') ? ' active' : '' }}" href="{{route('loans.index')}}">
                            <span class="nav-main-link-name">Задачи управления</span>
                            {{--                        <span class="nav-main-link-badge badge rounded-pill bg-primary">5</span>--}}
                        </a>
                    </li>
                @endif
                @if(Auth::user()->hasAnyRole('admin', 'observer'))
                    <li class="nav-main-item">
                        <a class="nav-main-link{{str_contains(Route::currentRouteName(), 'loans') ? ' active' : '' }}" href="{{route('loans.index')}}">
                            <span class="nav-main-link-name">Все задачи</span>
                            {{--                        <span class="nav-main-link-badge badge rounded-pill bg-primary">5</span>--}}
                        </a>
                    </li>
                @endif
                @if(Auth::user()->hasAnyRole('admin'))
                    <li class="nav-main-item">
                        <a class="nav-main-link{{Route::currentRouteName() === 'deleted' ? ' active' : '' }}" href="{{route('deleted')}}">
                            <span class="nav-main-link-name">Удаленные задачи</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link{{str_contains(Route::currentRouteName(), 'roles') ? ' active' : '' }}" href="{{route('roles.index')}}">
                            <span class="nav-main-link-name">Выдача/удаление ролей</span>
                        </a>
                    </li>
                @endif
                <li class="nav-main-item">
                    <a class="nav-main-link{{str_contains(Route::currentRouteName(), 'searchINN') ? ' active' : '' }}" href="{{route('searchINN')}}">
                        <span class="nav-main-link-name">Реквизиты по ИНН</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="#">
                        <span class="nav-main-link-name">Работа с выписками ЕГРН (в разработке)</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="#">
                        <span class="nav-main-link-name">Работа с выписками по р/с (в разработке)</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="#">
                        <span class="nav-main-link-name">Нумерация договоров (в разработке)</span>
                    </a>
                </li>
            </ul>
            <div class="mt-lg-8">
                <span class="nav-main-link-name">Все теги: </span>
                @include('loans.tags', ['tags' => $tagsCloud])
            </div>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>

<!-- END Sidebar -->
