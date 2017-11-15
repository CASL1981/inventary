<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
        <h5 class="text-condensedLight">Datos del Producto</h5>        
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">        
            {{ Form::text('description', null, ['class' => 'mdl-textfield__input', 'placeholder' => 'Descripción del Producto', 'pattern' => '-?[A-Z-ÁÉÍÓÚ ]*(\.[0-9]+)?']) }}
            <span class="mdl-textfield__error">Texto en Mayuscula</span>
        </div>        
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">        
            {{ Form::text('make', null, ['class' => 'mdl-textfield__input', 'placeholder' => 'Marca', 'pattern' => '-?[A-Z-ÁÉÍÓÚ ]*(\.[0-9]+)?']) }}
            <span class="mdl-textfield__error">Texto en Mayuscula</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            {{ Form::select('provider_id', $providers, null, ['class' => 'mdl-textfield__input']) }}
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">        
            {{ Form::text('um', null, ['class' => 'mdl-textfield__input', 'placeholder' => 'UM', 'pattern' => '-?[A-Z-ÁÉÍÓÚ ]*(\.[0-9]+)?']) }}
            <span class="mdl-textfield__error">Texto en Mayuscula</span>
        </div>
    </div>
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
        <h5 class="text-condensedLight">Parametro del Producto</h5>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            {{ Form::select('ABC', ['' => 'Selecione', 'A' => 'A', 'B' => 'B', 'C' => 'C'], null, ['class' => 'mdl-textfield__input']) }}
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            {{ Form::text('stockmin', null, ['class' => 'mdl-textfield__input', 'placeholder' => 'Stock Minimo', 'pattern' => '-?[0-9]*(\.[0-9]+)?']) }}
            <span class="mdl-textfield__error">Campo Numerico</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            {{ Form::text('stockmax', null, ['class' => 'mdl-textfield__input', 'placeholder' => 'Stock Maximo', 'pattern' => '-?[0-9]*(\.[0-9]+)?']) }}
            <span class="mdl-textfield__error">Campo Numerico</span>
        </div>
        <fieldset>
            <legend>Saldos</legend>
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
                    <label for="solicitud_id" class="control-label">Saldo Disponible</label>
                    {{ Form::text('residue', null, ['class' => 'mdl-textfield__input', 'disabled' => "true"]) }}
                </div>
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
                    <label for="solicitud_id" class="control-label">Estado Actual</label>
                    {{ Form::text('status', null, ['class' => 'mdl-textfield__input', 'disabled' => "true"]) }}
                </div>                
            </div>
        </fieldset>
    </div>
</div>
<p class="text-center">
    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addAdmin">
        <i class="zmdi zmdi-plus"></i>
    </button>
</p>