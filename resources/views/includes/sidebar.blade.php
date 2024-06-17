<div class="navbar-lateral full-reset">
    <div class="visible-xs font-movile-menu mobile-menu-button"></div>
    <div class="full-reset container-menu-movile nav-lateral-scroll">
        <div class="logo full-reset all-tittles">
            <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button"
                style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i>
            Sistema Bibliotecario
        </div>
        <div class="nav-lateral-divider full-reset"></div>
        <div class="full-reset" style="padding: 10px 0; color:#fff;">
            <figure>
                <img src="/assets/img/logo.png" alt="Biblioteca" class="img-responsive center-box"
                    style="width:55%;">
            </figure>
            <p class="text-center" style="padding-top: 15px;">Sistema Bibliotecario</p>
            <p class="text-center" style="padding-top: 15px;"> <i class="zmdi zmdi-calendar"></i>{{ now()->format('d-m-Y') }} </p>
            <p class="text-center" style="padding-top: 15px;"> <i class="zmdi zmdi-time"></i>{{ now()->format('H:i') }} </p>    
            
        </div>
        <div class="nav-lateral-divider full-reset"></div>
        <div class="full-reset nav-lateral-list-menu">
            <ul class="list-unstyled">
                <li>
                    @if(auth()->user()->hasRole('bibliotecario'))
                    <div class="dropdown-menu-button"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp;
                        Administración de usuarios <i
                            class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i></div>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}"><i class="zmdi zmdi-face zmdi-hc-fw"></i>&nbsp;&nbsp; Administrar
                        bibliotecarios</a></li>
                        <li><a href="{{ route('home/profesores') }}"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i>&nbsp;&nbsp; Administrar
                            profesores</a></li>
                        <li><a href="{{ route('home/miembros') }}"><i class="zmdi zmdi-accounts zmdi-hc-fw"></i>&nbsp;&nbsp; Administrar
                            miembros</a></li>
                    </ul>               
                </li>
                <li>                   
                    <div class="dropdown-menu-button"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i>&nbsp;&nbsp;
                        Libros y catálogo <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i>
                    </div>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('book.index') }}"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo
                                libro</a></li>
                        <li><a href="{{ route('catalogo.index') }}"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp;
                                Catálogo</a></li>
                    </ul>
                    
                </li>
                <li>
                    <div class="dropdown-menu-button"><i class="zmdi zmdi-alarm zmdi-hc-fw"></i>&nbsp;&nbsp;
                        Préstamos y reservaciones <i
                            class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i></div>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('prestamo.index') }}"><i class="zmdi zmdi-calendar zmdi-hc-fw"></i>&nbsp;&nbsp; Todos los
                                préstamos</a></li>
                    </ul>
                    @endif
                </li>
                <li><a href="report.html"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp; Reportes y
                        estadísticas</a></li>
                <li><a href="advancesettings.html"><i class="zmdi zmdi-wrench zmdi-hc-fw"></i>&nbsp;&nbsp;
                        Configuraciones avanzadas</a></li>
            </ul>
        </div>
    </div>
</div>