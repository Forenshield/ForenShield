<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}" target="_blank">
            <img src="{{ asset('assets/img/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">{{ config('app.name', 'Laravel') }}</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @php
                $url = Request::url();
            @endphp
            <li class="nav-item">
                <a class="nav-link {{ $url == route('home') ? 'active' : '' }}" href="{{ route('home') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-house {{ $url == route('home') ? '' : 'text-dark' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            @if (Auth::user()->is_admin)
                <li class="nav-item">
                    <a class="nav-link {{ $url == route('admin.users.index') ? 'active' : '' }}"
                        href="{{ route('admin.users.index') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i
                                class="fa-solid fa-users {{ $url == route('admin.users.index') ? '' : 'text-dark' }}"></i>
                        </div>
                        <span class="nav-link-text ms-1">Investigators</span>
                    </a>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link {{ $url == route('admin.crime-scene.index') ? 'active' : '' }}"
                    href="{{ route('admin.crime-scene.index') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i
                            class="fa-solid fa-asterisk {{ $url == route('admin.crime-scene.index') ? '' : 'text-dark' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">Crime Scenes</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ $url == route('admin.history.data1') ? 'active' : '' }}"
                    href="{{ route('admin.history.data1') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i
                            class="fa-solid fa-bar-chart {{ $url == route('admin.history.data1') ? '' : 'text-dark' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">IOT Data</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
