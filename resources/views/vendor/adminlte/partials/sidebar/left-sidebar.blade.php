<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
{{--                @if(config('adminlte.sidebar_nav_animation_speed') != 300)--}}
{{--                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"--}}
{{--                @endif--}}
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                {{-- Configured sidebar links --}}
                <li class="nav-item">

                    <a class="nav-link  " href="/home" dideo-checked="true">

                        <i class="fas fa-fw fa-user "></i>

                        <p>
                            داشبورد اصلی

                        </p>

                    </a>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" dideo-checked="true">
                        <i class="nav-icon fas  fa-circle nav-icon"></i>
                        <p>
                            مدیریت پایان نامه ها
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="/admin/thesis/create_one" class="nav-link" dideo-checked="true">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اضافه کردن تکی</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/thesis/create_group" class="nav-link" dideo-checked="true">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اضافه کردن اکسل</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/thesis/list" class="nav-link" dideo-checked="true">
                                <i class="far fa-circle nav-icon"></i>
                                <p>لیست کلی پایان نامه ها</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" dideo-checked="true">
                        <i class="nav-icon fas  fa-circle nav-icon"></i>
                        <p>
                            مدیریت پروپزال ها
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="/admin/proposal/create_one" class="nav-link" dideo-checked="true">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اضافه کردن تکی</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/proposal/create_group" class="nav-link" dideo-checked="true">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اضافه کردن اکسل</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/proposal/list" class="nav-link" dideo-checked="true">
                                <i class="far fa-circle nav-icon"></i>
                                <p>لیست کلی پروپزال</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" dideo-checked="true">
                        <i class="nav-icon fas  fa-circle nav-icon"></i>
                        <p>
                            مدیریت طرح ها
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="/admin/plan/create_one" class="nav-link" dideo-checked="true">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اضافه کردن تکی</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/plan/create_group" class="nav-link" dideo-checked="true">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اضافه کردن اکسل</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/plan/list" class="nav-link" dideo-checked="true">
                                <i class="far fa-circle nav-icon"></i>
                                <p>لیست کلی طرح ها</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

</aside>
