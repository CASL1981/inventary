@extends('layouts.pagecontentlist')

@section('listItem')
    <div class="full-width panel-tittle bg-success text-center tittles">
        Lista de Usuarios
    </div>
    <div class="full-width panel-content">
        @foreach ($users as $user)
            <div class="mdl-list">
                <li class="full-width divider-menu-h"></li>
                <div class="mdl-list__item mdl-list__item--two-line">
                    <span class="mdl-list__item-primary-content">                
                        <span>{{ $loop->index + 1 }}.</span>
                        <span>{{ $user->name }}</span>
                        <span class="mdl-list__item-sub-title">CC {{ $user->cc }}</span>
                    </span>
                    <a href="{{ route('user.edit', $user) }}" class="mdl-list__item-secondary-action drop">
                    <i class="zmdi zmdi-more"></i>
                     </a>
                </div>        
            </div>    
        @endforeach
        
        {{ $users->render() }}        
    </div>    
@endsection

