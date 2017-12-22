<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
        <h5 class="text-condensedLight">Datos del Producto</h5>        
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" pattern="-?[A-Z-ÁÉÍÓÚ ]*(\.[0-9]+)?" placeholder="Descripción del Producto" v-model='datos.description'>
            <span class="mdl-textfield__error">Texto en Mayuscula</span>
        </div>        
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" pattern="-?[A-Z-ÁÉÍÓÚ ]*(\.[0-9]+)?" placeholder="Marca" v-model='datos.make'>
            <span class="mdl-textfield__error">Texto en Mayuscula</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield">
            <select class="mdl-textfield__input" v-model='datos.provider_id'>
              <option :value="provider.id" v-for="provider in providers" v-text="provider.description"></option>              
            </select>
            <label class="mdl-textfield__label" for="area" id="labelProvider" v-show="viewlabel">Selecione Proveedor</label>            
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" pattern="-?[0-9 A-Z-ÁÉÍÓÚ]*(\.[0-9]+)?" placeholder="UM" v-model='datos.um'>
            <span class="mdl-textfield__error">Texto en Mayuscula</span>
        </div>
    </div>
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
        <h5 class="text-condensedLight">Parametro del Producto</h5>
        <div class="mdl-textfield mdl-js-textfield">
            <select class="mdl-textfield__input" v-model='datos.ABC' v-cloak>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
            </select>
            <label class="mdl-textfield__label" for="area" id="labelABC" v-show="viewlabel">Selecione ABC</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield">
            <select class="mdl-textfield__input" v-model='datos.typearticle' v-cloak>
              <option value="aseo_cafeteria">Aseo y Cafeteria</option>
              <option value="papeleria">Papeleria</option>
              <option value="otros">Otros</option>
            </select>
            <label class="mdl-textfield__label" for="area" id="labelABC" v-show="viewlabel">Selecione Tipo de Articulo</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" placeholder="Stock Minimo" v-model='datos.stockmin'>
            <span class="mdl-textfield__error">Campo Numerico</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" placeholder="Stock Maximo" v-model='datos.stockmax'>
            <span class="mdl-textfield__error">Campo Numerico</span>
        </div>
        <fieldset>
            <legend>Saldos</legend>
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
                    <label for="solicitud_id" class="control-label">Saldo Disponible</label>
                    <input class="mdl-textfield__input" type="number" v-model='datos.residue' disabled="TRUE">
                </div>
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
                    <label for="solicitud_id" class="control-label">Estado Actual</label>
                    <input class="mdl-textfield__input" type="text" v-model='datos.status' disabled="TRUE">
                </div>                
            </div>
        </fieldset>
    </div>
</div>
<p class="text-center">
    <div v-if="viewlabel" class="text-center">        
        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addAdmin" @click.prevent="storeArticle(datos)">
            <i class="zmdi zmdi-plus"></i>
        </button>
    </div>
    <div v-else class="text-center">
        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addAdmin" @click.prevent="updateArticle(datos)" v-cloak>
              <i class="zmdi zmdi-plus"></i>
        </button>
        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-danger" id="btn-addAdmin" @click.prevent="deleteArticle(datos)" v-cloak>
              <i class="zmdi zmdi-delete"></i>
        </button>
    </div>

    <div class="mdl-tooltip" for="btn-addAdmin">Add Articulo</div>
</p>