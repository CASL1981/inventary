@extends('layouts.pagecontentcreate')

@section('formcreate')  
	<div class="full-width panel-tittle bg-primary text-center tittles">
        Nuevo Usuario
    </div>   
    <div class="full-width panel-content">
        @if (isset($user))
            {{ Form::model($user, ['route' => ['user.update', $user], 'method' => 'PUT']) }}
        @else
            {{ Form::open(['route' => 'user.store', 'method' => 'POST']) }}                            
        @endif
            @include('users.form')
        {{ Form::close() }}                            
    </div>    
@endsection