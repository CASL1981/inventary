<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
        <h5 class="text-condensedLight">Información Proveedor</h5>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">        
            {{ Form::text('nit', null, ['class' => 'mdl-textfield__input', 'placeholder' => 'NIT', 'autofocus' => 'true', 'pattern' => '-?[0-9]*(\.[0-9]+)?']) }}
            <span class="mdl-textfield__error">Campo Numerico</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        
            {{ Form::text('description', null, ['class' => 'mdl-textfield__input', 'placeholder' => 'Razon Social', 'pattern' => '-?[A-Z-ÁÉÍÓÚ ]*(\.[0-9]+)?']) }}
            <span class="mdl-textfield__error">Texto en Mayuscula</span>
        </div>        
    </div>
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
        <h5 class="text-condensedLight">Detalle de Contacto</h5>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            {{ Form::text('address', null, ['class' => 'mdl-textfield__input', 'placeholder' => 'Dirección', 'pattern' => '-?[A-Z-ÁÉÍÓÚ-0-9 ]*(\.[0-9]+)?']) }}
            <span class="mdl-textfield__error">Texto en Mayuscula</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            {{ Form::text('phone', null, ['class' => 'mdl-textfield__input', 'placeholder' => 'Telefono', 'pattern' => '-?[0-9]*(\.[0-9]+)?']) }}
            <span class="mdl-textfield__error">Campo Numerico</span>
        </div>
    </div>
</div>
<p class="text-center">
    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addAdmin">
        <i class="zmdi zmdi-plus"></i>
    </button>
</p>