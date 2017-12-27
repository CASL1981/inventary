<nav class="full-width">
    <ul class="full-width list-unstyle menu-principal">
        <li class="full-width">
            <a href="{{ route('home') }}" class="full-width">
                <div class="navLateral-body-cl">
                    <i class="zmdi zmdi-view-dashboard"></i>
                </div>
                <div class="navLateral-body-cr hide-on-tablet">
                    HOME
                </div>
            </a>
        </li>
        <li class="full-width divider-menu-h"></li>
        <li class="full-width">
            <a href="#!" class="full-width btn-subMenu">
                <div class="navLateral-body-cl">
                    <i class="zmdi zmdi-case"></i>
                </div>
                <div class="navLateral-body-cr hide-on-tablet">
                    ADMINISTRACIÓN
                </div>
                <span class="zmdi zmdi-chevron-left"></span>
            </a>
            <ul class="full-width menu-principal sub-menu-options">
                @if (auth()->user()->role == 'admin')
                    <li class="full-width">
                        <a href="{{ route('linkuser') }}" class="full-width">
                            <div class="navLateral-body-cl">
                                <i class="zmdi zmdi-face"></i>
                            </div>
                            <div class="navLateral-body-cr hide-on-tablet">
                                USUARIOS
                            </div>
                        </a>
                    </li>                    
                @endif
                @if (auth()->user()->role != 'normal')
                    <li class="full-width divider-menu-h"></li>
                    <li class="full-width">
                        <a href="{{ route('linkprovider') }}" class="full-width">
                            <div class="navLateral-body-cl">
                                <i class="zmdi zmdi-truck"></i>
                            </div>
                            <div class="navLateral-body-cr hide-on-tablet">
                                PROVEEDORES
                            </div>
                        </a>
                    </li>                    
                @endif

                <li class="full-width divider-menu-h"></li>
                <li class="full-width">
                    <a href="{{ route('linkarticle') }}" class="full-width">
                        <div class="navLateral-body-cl">
                            <i class="zmdi zmdi-washing-machine"></i>
                        </div>
                        <div class="navLateral-body-cr hide-on-tablet">
                            PRODUCTOS
                        </div>
                    </a>
                </li>        
            </ul>
        </li>        
        <li class="full-width divider-menu-h"></li>        
        <li class="full-width">
            <a href="{{ url('salida') }}" class="full-width">
                <div class="navLateral-body-cl">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>
                <div class="navLateral-body-cr hide-on-tablet">
                    SALIDAS
                </div>
            </a>
        </li>
        <li class="full-width divider-menu-h"></li>
        <li class="full-width">
            <a href="{{ url('entrada') }}" class="full-width">
                <div class="navLateral-body-cl">
                    <i class="zmdi zmdi-label"></i>
                </div>
                <div class="navLateral-body-cr hide-on-tablet">
                    ENTRADAS
                </div>
            </a>
        </li>
        <li class="full-width divider-menu-h"></li>
        <li class="full-width">
            <a href="{{ route('linkinventary') }}" class="full-width">
                <div class="navLateral-body-cl">
                    <i class="zmdi zmdi-store"></i>
                </div>
                <div class="navLateral-body-cr hide-on-tablet">
                    INVENTARIO
                </div>
            </a>
        </li>
        <li class="full-width divider-menu-h"></li>
        <li class="full-width">
            <a href="#!" class="full-width btn-subMenu">
                <div class="navLateral-body-cl">
                    <i class="zmdi zmdi-assignment"></i>
                </div>
                <div class="navLateral-body-cr hide-on-tablet">
                    INFORMES
                </div>
                <span class="zmdi zmdi-chevron-left"></span>
            </a>
            <ul class="full-width menu-principal sub-menu-options">
                <li class="full-width">
                    <a href="{{ route('linkkardexitem') }}" class="full-width">
                        <div class="navLateral-body-cl">
                            <i class="zmdi zmdi-dehaze"></i>
                        </div>
                        <div class="navLateral-body-cr hide-on-tablet">
                            Kardex Por Item
                        </div>
                    </a>
                </li>
                {{-- <li class="full-width">
                    <a href="#!" class="full-width">
                        <div class="navLateral-body-cl">
                            <i class="zmdi zmdi-widgets"></i>
                        </div>
                        <div class="navLateral-body-cr hide-on-tablet">
                            OPTION
                        </div>
                    </a>
                </li> --}}
            </ul>
        </li>
    </ul>
</nav>