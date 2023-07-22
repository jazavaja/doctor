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

                    <a class="nav-link  " href="/admin/thesis" dideo-checked="true">

                        <i class="fas fa-fw fa-user "></i>

                        <p>
                            پایان نامه ها

                        </p>

                    </a>

                </li>
                <li class="nav-item">

                    <a class="nav-link  " href="/admin/proposal" dideo-checked="true">

                        <i class="fas fa-fw fa-user "></i>

                        <p>
                            پروپزال ها

                        </p>

                    </a>

                </li>
                <li class="nav-item">

                    <a class="nav-link  " href="/admin/plans" dideo-checked="true">

                        <i class="fas fa-fw fa-user "></i>

                        <p>
                            طرح ها

                        </p>

                    </a>

                </li>
            </ul>
        </nav>
    </div>

</aside>
