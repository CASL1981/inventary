@extends('layouts.pagecontentcreate')

@section('formcreate')
    <div class="full-width panel-tittle bg-primary text-center tittles">
        Crear Productos
    </div>    
    <div class="full-width panel-content">
        @if (isset($article))
            {{ Form::model($article, ['route' => ['article.update', $article], 'method' => 'PUT']) }}
        @else
            {{ Form::open(['route' => 'article.store', 'method' => 'POST']) }}                            
        @endif
            @include('articles.form')
        {{ Form::close() }}                            
    </div>    
@endsection