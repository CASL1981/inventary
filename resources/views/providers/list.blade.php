@extends('layouts.pagecontentlist')

@section('listItem')
    <div class="full-width panel-tittle bg-success text-center tittles">
        Lista de Proveedores
    </div>
    <div class="full-width panel-content">
        @foreach ($providers as $provider)
            <div class="mdl-list">
                <li class="full-width divider-menu-h"></li>
                <div class="mdl-list__item mdl-list__item--two-line">
                    <span class="mdl-list__item-primary-content">                
                        <span>{{ $loop->index + 1 }}.</span>
                        <span>{{ $provider->description }}</span>
                        <span class="mdl-list__item-sub-title">NIT {{ $provider->nit }}</span>
                    </span>
                    <a href="{{ route('provider.edit', $provider) }}" class="mdl-list__item-secondary-action drop">
                    <i class="zmdi zmdi-more"></i>
                     </a>
                </div>
            </div>    
        @endforeach
        {{ $providers->render() }}        
    </div>    
@endsection


