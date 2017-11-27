<form>
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
            <h5 class="text-condensedLight">Información Proveedor</h5>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">        
                <input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" placeholder="NIT" v-model='datos.nit' autofocus="true">            
                <span class="mdl-textfield__error">Campo Numerico</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" pattern="-?[A-Z-ÁÉÍÓÚ ]*(\.[0-9]+)?" placeholder="Razon Social" v-model='datos.description'>
                <span class="mdl-textfield__error">Texto en Mayuscula</span>
            </div>        
        </div>
        <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
            <h5 class="text-condensedLight">Detalle de Contacto</h5>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" pattern="-?[A-Z-ÁÉÍÓÚ ]*(\.[0-9]+)?" placeholder="Dirección" v-model='datos.address'>
                <span class="mdl-textfield__error">Texto en Mayuscula</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" pattern="-?[A-Z-ÁÉÍÓÚ ]*(\.[0-9]+)?" placeholder="Telefono" v-model='datos.phone'>
                <span class="mdl-textfield__error">Campo Numerico</span>
            </div>
        </div>
    </div>
    <p class="text-center">
        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addAdmin" v-if="viewlabel" @click.prevent="storeProvider(datos)">
            <i class="zmdi zmdi-plus"></i>
        </button>
        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addAdmin" v-else @click.prevent="updateProvider(datos)" v-cloak>
              <i class="zmdi zmdi-plus"></i>
        </button>
        <div class="mdl-tooltip" for="btn-addAdmin">Add Proveedor</div>            
    </p>
</form>