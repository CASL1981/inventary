<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
        <h5 class="text-condensedLight">Información Empleado</h5>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            {{ Form::text('cc', null, ['class' => 'mdl-textfield__input', 'placeholder' => 'Cedula', 'autofocus' => 'true']) }}
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            {{ Form::text('firstname', null, ['class' => 'mdl-textfield__input', 'placeholder' => 'Nombres']) }}
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            {{ Form::text('lastname', null, ['class' => 'mdl-textfield__input', 'placeholder' => 'Apellidos']) }}
        </div>
        <div class="mdl-textfield mdl-js-textfield">
            {{ Form::select('role', ['' => 'Seleciones Role', 'admin' => 'Administrador', 'edit' => 'Editor', 'normal' => 'Ejecutor'], null, ['class' => 'mdl-textfield__input']) }}
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            {{ Form::text('email', null, ['class' => 'mdl-textfield__input', 'placeholder' => 'Email']) }}
        </div>
        <div class="mdl-textfield mdl-js-textfield">
            {{ Form::select('area', ['' => 'Seleciona Area', 'administracion' => 'Administración', 'comercial' => 'Comercial', 'farmacia' => 'Farmacia'], null, ['class' => 'mdl-textfield__input']) }}
        </div>
    </div>
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
        <h5 class="text-condensedLight">Detalle de Cuenta</h5>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            {{ Form::text('nick', null, ['class' => 'mdl-textfield__input', 'placeholder' => 'Nick']) }}
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            {{ Form::password('password', ['class' => 'mdl-textfield__input', 'placeholder' => 'Password']) }}
        </div>
        <h5 class="text-condensedLight">Seleciona Avatar</h5>
        <label class="mdl-js-ripple-effect" for="option-1">                                            
            {{ Form::radio('avatar', 'avatar-male.png', true) }}
            <img src="{{ asset('assets/img/avatar-male.png') }}" alt="avatar" style="height: 45px; width="45px;" ">
            <span class="mdl-radio__label">Avatar 1</span>
        </label>
        <br><br>
        <label class="mdl-js-ripple-effect" for="option-2">
            {{ Form::radio('avatar', 'avatar-female.png') }}
            <img src="{{ asset('assets/img/avatar-female.png') }}" alt="avatar" style="height: 45px; width="45px;" ">
            <span class="mdl-radio__label">Avatar 2</span>
        </label>
        <br><br>
        <label class="mdl-js-ripple-effect" for="option-3">
            {{ Form::radio('avatar', 'avatar-male2.png') }}
            <img src="{{ asset('assets/img/avatar-male2.png') }}" alt="avatar" style="height: 45px; width="45px;" ">
            <span class="mdl-radio__label">Avatar 3</span>
        </label>
        <br><br>
        <label class="mdl-js-ripple-effect" for="option-4">                                            
            {{ Form::radio('avatar', 'avatar-female2.png') }}
            <img src="{{ asset('assets/img/avatar-female2.png') }}" alt="avatar" style="height: 45px; width="45px;" ">
            <span class="mdl-radio__label">Avatar 4</span>
        </label>
    </div>
</div>
    <p class="text-center">
        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addAdmin">
            <i class="zmdi zmdi-plus"></i>
        </button>
    </p>