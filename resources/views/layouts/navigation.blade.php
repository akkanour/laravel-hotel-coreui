<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>

@if(auth()->user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
                </svg>
                {{ __('Dashboard') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-group') }}"></use>
                </svg>
                {{ __('Users') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('personnel_all') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-user-plus') }}"></use>
                </svg>
                {{ __('Personnels') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('chambre_all') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-bed') }}"></use>
                </svg>
                {{ __('Chambres') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('client_all') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-group') }}"></use>
                </svg>
                {{ __('Clients') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reservation_all') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-calendar') }}"></use>
                </svg>
                {{ __('Résérvation') }}
            </a>
        </li>
@endif
    @if(auth()->user()->role == 'personnel')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('client_all') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                </svg>
                {{ __('Clients') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('chambre_all') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                </svg>
                {{ __('Chambres') }}
            </a>
        </li>
    @endif
    @if(auth()->user()->role == 'client')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('client-reservation') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-calendar') }}"></use>
                </svg>
                {{ __('Résérvation') }}
            </a>
        </li>
    @endif
</ul>
