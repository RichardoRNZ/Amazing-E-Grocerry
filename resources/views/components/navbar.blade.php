<!-- Navbar -->
@php
    use App\Http\Controllers\HomeController;
    $count = HomeController::countCart();
@endphp
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
                Amazing E-Grocery
            </a>
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth


                @if (Auth::user()->role_id ===1)
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('manage-account')}}">{{__('message.account')}}</a>
                  </li>
                @endif
                @endauth

            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <!-- Icon -->
            <div class="dropdown">
                <a class="text-white me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                    role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    {{ Config::get('languange')[App::getLocale()] }}
                    <i class="fa-solid fa-globe"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    @foreach (Config::get('languange') as $lang => $language)
                        @if ($lang != App::getLocale())
                            <li><a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                                    {{ $language }}</a></li>
                        @endif
                    @endforeach

                </ul>
            </div>
            @auth


                <a class="text-white me-3" href="{{ route('home') }}">
                    <i class="fas fa-home"></i>
                </a>
                <a class="text-white me-3" href="{{ route('view-cart') }}">
                    <i class="fas fa-shopping-cart"></i>
                    @if ($count !== 0)
                        <span class="badge rounded-pill badge-notification bg-danger">{{ $count }}</span>
                    @endif
                </a>

                <!-- Notifications -->

                <!-- Avatar -->
                <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                        id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('/storage/images/' . Auth::user()->display_picture_link) }}"
                            class="rounded-circle" height="30" width="30" alt="Black and White Portrait of a Man"
                            loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile') }}">{{__('message.myprofile')}}</a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}">{{__('message.logout')}}</a>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login-page') }}" type="button" class="btn px-3 me-2 text-white">
                    {{__('message.login')}}
                </a>
            @endauth
        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->
