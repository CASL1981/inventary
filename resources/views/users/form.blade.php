<form>
  <div class="mdl-grid">
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
      <h5 class="text-condensedLight">Datos Usuario</h5>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" placeholder="CC" v-model='datos.cc'>
        <span class="mdl-textfield__error">Solo Numeros</span>
      </div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" pattern="-?[A-Z-ÁÉÍÓÚ ]*(\.[0-9]+)?" placeholder="Nombre" v-model='datos.firstname'>
        <span class="mdl-textfield__error">Solo Mayusculas</span>
      </div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" pattern="-?[A-Z-ÁÉÍÓÚ ]*(\.[0-9]+)?" placeholder="Apellidos" v-model='datos.lastname'>
        <span class="mdl-textfield__error">Solo Mayusculas</span>
      </div>
      <div class="mdl-textfield mdl-js-textfield">
        <select class="mdl-textfield__input" v-model='datos.role'>
          <option value="" disabled="" selected="">Selecione Role</option>
          <option value="admin">Administrador</option>
          <option value="edit">Editor</option>
          <option value="normal">Digitador</option>
        </select>
        <label class="mdl-textfield__label" for="role" id="labelRole" v-show="viewlabel">Selecione Role</label>
      </div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="email" placeholder="Email" v-model='datos.email'>
        <span class="mdl-textfield__error">E-mail Invalido</span>
      </div>
      <div class="mdl-textfield mdl-js-textfield">
        <select class="mdl-textfield__input" v-model='datos.area'>
          <option value="" disabled="" selected="">Selecione Area</option>
          <option value="administracion">Administración</option>
          <option value="comercial">Comercial</option>
          <option value="farmacia">Farmacia</option>
        </select>
        <label class="mdl-textfield__label" for="area" id="labelArea" v-show="viewlabel">Selecione Area</label>
      </div>                        
    </div>
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
      <h5 class="text-condensedLight">Detalle de la Cuenta</h5>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" pattern="-?[A-Z-ÁÉÍÓÚ]*(\.[0-9]+)?" placeholder="Nick" v-model='datos.nick'>                          
        <span class="mdl-textfield__error">Solo Mayusculas</span>
      </div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" v-show="viewlabel">
        <input class="mdl-textfield__input" type="password" placeholder="Password" v-model='datos.password'>
        <span class="mdl-textfield__error">Invalid password</span>
      </div>
      <h5 class="text-condensedLight">Choose Avatar</h5>
      <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
        <input type="radio" id="option-1" class="mdl-radio__button" name="options" value="avatar-male.png" v-model='datos.avatar'>
        <img src="{{ asset('assets/img/avatar-male.png') }}" alt="avatar" style="height: 45px; width=45px;">
        <span class="mdl-radio__label">Avatar 1</span>
      </label>
      <br><br>
      <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
        <input type="radio" id="option-2" class="mdl-radio__button" name="options" value="avatar-female.png" v-model='datos.avatar'>
        <img src="{{ asset('assets/img/avatar-female.png') }}" alt="avatar" style="height: 45px; width=45px;">
        <span class="mdl-radio__label">Avatar 2</span>
      </label>
      <br><br>
      <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-3">
        <input type="radio" id="option-3" class="mdl-radio__button" name="options" value="avatar-male2.png" v-model='datos.avatar'>
        <img src="{{ asset('assets/img/avatar-male2.png') }}" alt="avatar" style="height: 45px; width=45px;">
        <span class="mdl-radio__label">Avatar 3</span>
      </label>
      <br><br>
      <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-4">
        <input type="radio" id="option-4" class="mdl-radio__button" name="options" value="avatar-female2.png" v-model='datos.avatar'>
        <img src="{{ asset('assets/img/avatar-female2.png') }}" alt="avatar" style="height: 45px; width=45px;">
        <span class="mdl-radio__label">Avatar 4</span>
      </label>
    </div>
  </div>
  <p class="text-center">
    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addAdmin" v-if="viewlabel" @click.prevent="storeUser(datos)">
    <i class="zmdi zmdi-plus"></i>
    </button>
    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addAdmin" v-else @click.prevent="updateUser(datos)" v-cloak>
      <i class="zmdi zmdi-plus"></i>
    </button>
    <div class="mdl-tooltip" for="btn-addAdmin">Add Usuario</div>
  </p>
</form>