@extends('layouts.pagecontentlist')

@section('listItem')
    <div class="full-width panel-tittle bg-success text-center tittles">
        Lista de Articulos
    </div>
    <div class="full-width panel-content">
        @foreach ($articles as $article)
            <div class="mdl-list">
                <li class="full-width divider-menu-h"></li>
                <div class="mdl-list__item mdl-list__item--two-line">
                    <span class="mdl-list__item-primary-content">                
                        <span>{{ $loop->index + 1 }}.</span>
                        <span>{{ $article->description }}</span>
                        <span class="mdl-list__item-sub-title">MARCA {{ $article->make }}</span>
                    </span>
                    <a href="{{ route('article.edit', $article) }}" class="mdl-list__item-secondary-action drop">
                    <i class="zmdi zmdi-more"></i>
                     </a>
                </div>
            </div>    
        @endforeach
        {{ $articles->render() }}        
    </div>    
@endsection


