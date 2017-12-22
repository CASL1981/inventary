<section class="full-width pageContent">
    <section class="full-width text-center" style="padding: 40px 0;">
        <h3 class="text-center tittles">OPCIONES PRINCIPALES</h3>
        <!-- Tiles -->
        @if (auth()->user()->role == 'admin')
            <article class="full-width tile">
                <a href="{{ route('linkuser') }}">
                    <div class="tile-text">
                        <span class="text-condensedLight">
                            2<br>
                            <small>Usuarios</small>
                        </span>
                    </div>
                    <i class="zmdi zmdi-account tile-icon"></i>                
                </a>
            </article>            
        @endif
        @if (auth()->user()->role != 'normal')
            <article class="full-width tile">
                <a href="{{ route('linkprovider') }}">
                    <div class="tile-text">
                        <span class="text-condensedLight">
                            7<br>
                            <small>Provedores</small>
                        </span>
                    </div>
                    <i class="zmdi zmdi-truck tile-icon"></i>
                </a>
            </article>            
        @endif
        <article class="full-width tile">
            <a href="{{ route('linkinventary') }}">
                <div class="tile-text">
                    <span class="text-condensedLight">
                        2<br>
                        <small>Inventario</small>
                    </span>
                </div>
                <i class="zmdi zmdi-store tile-icon"></i>                
            </a>
        </article>        
        <article class="full-width tile">
            <a href="{{ url('entrada') }}">
                <div class="tile-text">
                    <span class="text-condensedLight">
                        9<br>
                        <small>Entradas</small>
                    </span>
                </div>                
            </a>
            <i class="zmdi zmdi-label tile-icon"></i>
        </article>
        <article class="full-width tile">
            <a href="{{ route('linkarticle') }}">
                <div class="tile-text">
                    <span class="text-condensedLight">
                        121<br>
                        <small>Productos</small>
                    </span>
                </div>
                <i class="zmdi zmdi-washing-machine tile-icon"></i>
            </a>
        </article>
        <article class="full-width tile">
            <a href="{{ url('salida') }}">
                <div class="tile-text">
                    <span class="text-condensedLight">
                        47<br>
                        <small>Salidas</small>
                    </span>
                </div>                
            </a>
            <i class="zmdi zmdi-shopping-cart tile-icon"></i>
        </article>
    </section>        
</section>