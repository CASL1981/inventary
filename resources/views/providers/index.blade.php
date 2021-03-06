@extends('home')

@section('desktop')

<section class="full-width pageContent">    
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
      <div class="mdl-tabs__tab-bar">
        <a href="#tabNew" class="mdl-tabs__tab is-active" v-if="viewlabel" >NUEVO</a>
        <a href="#tabNew" class="mdl-tabs__tab is-active" v-else v-cloak>MODIFICAR</a>
        <a href="#tabList" class="mdl-tabs__tab" v-show="viewlabel">LISTADO</a>
      </div>
      <div class="mdl-tabs__panel is-active" id="tabNew">
        <div class="mdl-grid">
          <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
            <div class="full-width panel mdl-shadow--2dp">
              <div class="full-width panel-tittle bg-primary text-center tittles" v-show="viewlabel">
                Crear Proveedor
              </div>
               @include('providers.form')
            </div>
          </div>
        </div>
      </div>
      <div class="mdl-tabs__panel" id="tabList" v-cloak v-show="viewlabel">
        <div class="mdl-grid">
          @include('providers.list')
        </div>
      </div>
    </div>
  </section>
  
@endsection

@section('script')
  <script type="text/javascript">

    var vm = new Vue({
      el:'#main',
      created(){
        this.getProviders();        
      },
      data: {
        providers:[],
        datos:[],
        viewlabel: true,
        pagination: {
          'total': 0,
          'current_page': 0,
          'per_page': 0,
          'last_page': 0,
          'from': 0,
          'to': 0
        },
        errors: '',
        offset: 3,
        search:'',
      },
      computed: {
        isActived: function() {
          return this.pagination.current_page;
        },
        pagesNumber: function() {
          if(!this.pagination.to){
            return [];
          }

          var from = this.pagination.current_page - this.offset; 
          if(from < 1){
            from = 1;
          }

          var to = from + (this.offset * 2); 
          if(to >= this.pagination.last_page){
            to = this.pagination.last_page;
          }

          var pagesArray = [];
          while(from <= to){
            pagesArray.push(from);
            from++;
          }
          return pagesArray;
        },
        filterProvider() {
          return this.providers.filter((provider) => provider.description.includes(this.search));
        }
      },
      methods: {
        getProviders(page){
          var url = '/provider?page='+page;
          axios.get(url).then(response => {
            this.providers = response.data.providers.data,
            this.pagination = response.data.pagination
          });
        },
        storeProvider(datos) {              
              var url = '/provider';
              axios.post(url, {
                nit: datos.nit,
                description: datos.description,
                address: datos.address,
                phone: datos.phone                
              }).then(response => {
                toastr.success('Proveedor creado correctamente');               
                datos.nit = '';
                datos.description = '';
                datos.address = '';
                datos.phone = '';                
                this.viewlabel = true;
                this.getProviders()
              }).catch(e => { 
                // this.errorsStore = [];
                //   this.errorsStore.push(e.response.data);
                });
            },
          getEditar(provider) {
            var url = '/provider/' + provider.id + '/edit';
            axios.get(url).then(response => {
              this.viewlabel = false;
              this.datos = response.data;              
            });
          },
          updateProvider(datos) {              
              var url = '/provider/' + datos.id;
              axios.put(url, {
                nit: datos.nit,
                description: datos.description,
                address: datos.address,
                phone: datos.phone                
              }).then(response => {
                toastr.success('Proveedor actualizado correctamente');               
                datos.nit = '';
                datos.description = '';
                datos.address = '';
                datos.phone = '';                
                this.viewlabel = true;
                this.getProviders()
              }).catch(e => { 
                // this.errorsStore = [];
                //   this.errorsStore.push(e.response.data);
                });
            },
            changePage: function(page) {
              this.pagination.current_page = page;
              this.getProviders(page);
            }
      }
    })
  </script>
@endsection
  {{-- <div>
    <table>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Created At</th>
      </tr>
      <tr>
        <td>@{{ user.name }}</td>
        <td>@{{ user.email }}</td>
        <td>@{{ user.created_at }}</td>
      </tr>
    </table>
    <vue-pagination  :pagination="pagination"
                     v-on:click.native="getUsers(pagination.current_page)"
                     :offset="4">
    </vue-pagination>
    </div> --}}