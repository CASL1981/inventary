@extends('layouts.pagecontentcreate')

@section('formcreate')
    <div class="full-width panel-tittle bg-primary text-center tittles">
        Nuevo Proveedor
    </div>    
    <div class="full-width panel-content">
        @if (isset($provider))
            {{ Form::model($provider, ['route' => ['provider.update', $provider], 'method' => 'PUT']) }}
        @else
            {{ Form::open(['route' => 'provider.store', 'method' => 'POST']) }}                            
        @endif
            @include('providers.form')
        {{ Form::close() }}                            
    </div>    
@endsection