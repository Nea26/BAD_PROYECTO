<nav class="navbar-user-top full-reset">
    <ul class="list-unstyled full-reset">
        <figure>
            @if(auth()->user()->hasRole('bibliotecario'))
            <img src="/assets/img/user01.png" alt="user-picture" class="img-responsive img-circle center-box">
            @endif
        </figure>
        <figure>
            @if(auth()->user()->hasRole('profesor'))
            <img src="/assets/img/user02.png" alt="user-picture" class="img-responsive img-circle center-box">
            @endif
        </figure>
           <figure>
            @if (auth()->user()->hasRole('miembro'))
                <img src="/assets/img/user03.png" alt="user-picture" class="img-responsive img-circle center-box">
            @endif
        </figure>
        <li style="color:#fff; cursor:default;">
            @if (auth()->check())
                <span class="all-tittles">{{ explode(' ', auth()->user()->nombre)[0] }}
                    {{ explode(' ', auth()->user()->apellido)[0] }}</span>
            @endif
        </li>

        <li class="tooltips-general exit-system-button" data-placement="bottom" title="Salir del sistema">
            <a href="{{ route('logout') }}" onclick="salirSistema(event);"
                style="color: #fff; font-size: 20px;">
                <i class="zmdi zmdi-power"></i>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>

        <li class="tooltips-general search-book-button" data-href="searchbook.html" data-placement="bottom"
            title="Buscar libro">
            <i class="zmdi zmdi-search"></i>
        </li>
        <li class="tooltips-general btn-help" data-placement="bottom" title="Ayuda">
            <i class="zmdi zmdi-help-outline zmdi-hc-fw"></i>
        </li>
        <li class="mobile-menu-button visible-xs" style="float: left !important;">
            <i class="zmdi zmdi-menu"></i>
        </li>
        <li class="desktop-menu-button hidden-xs" style="float: left !important;">
            <i class="zmdi zmdi-swap"></i>
        </li>
    </ul>
</nav>