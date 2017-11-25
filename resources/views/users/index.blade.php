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
                Nuevo Usuario                                   
              </div>
               @include('users.form')
            </div>
          </div>
        </div>
      </div>
      <div class="mdl-tabs__panel" id="tabList" v-cloak v-show="viewlabel">
        <div class="mdl-grid">
          @include('users.list')
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
        this.getUsers();        
      },
      data: {
        users:[],
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
        offset: 2,
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
        filterUser() {
          return this.users.filter((user) => user.firstname.includes(this.search) || user.lastname.includes(this.search));
        }
      },
      methods: {
        getUsers(page){
          var url = '/user?page='+page;
          axios.get(url).then(response => {
            this.users = response.data.users.data,
            this.pagination = response.data.pagination
          });
        },
        storeUser(datos) {              
              var url = '/user';
              axios.post(url, {
                cc: datos.cc,
                firstname: datos.firstname,
                lastname: datos.lastname,
                role: datos.role,
                email: datos.email,
                area: datos.area,
                nick: datos.nick,
                password: datos.password,
                avatar: datos.avatar
              }).then(response => {
                toastr.success('Usuario creado correctamente');               
                datos.cc = '';
                datos.firstname = '';
                datos.lastname = '';
                datos.role = '';
                datos.email = '';
                datos.area = '';
                datos.nick = '';
                datos.password = '';
                this.viewlabel = true;
                this.getUsers()
              }).catch(e => { 
                // this.errorsStore = [];
                //   this.errorsStore.push(e.response.data);
                });
            },
          getEditar(user) {
            var url = '/user/' + user.id + '/edit';
            axios.get(url).then(response => {
              this.viewlabel = false;
              this.datos = response.data;              
            });
          },
          updateUser(datos) {              
              var url = '/user/' + datos.id;
              axios.put(url, {
                cc: datos.cc,
                firstname: datos.firstname,
                lastname: datos.lastname,
                role: datos.role,
                email: datos.email,
                area: datos.area,
                nick: datos.nick,
                avatar: datos.avatar
              }).then(response => {
                toastr.success('Usuario actualizado correctamente');               
                datos.cc = '';
                datos.firstname = '';
                datos.lastname = '';
                datos.role = '';
                datos.email = '';
                datos.area = '';
                datos.nick = '';
                datos.password = '';
                this.viewlabel = true;
                this.getUsers()
              }).catch(e => { 
                // this.errorsStore = [];
                //   this.errorsStore.push(e.response.data);
                });
            },
            changePage: function(page) {
              this.pagination.current_page = page;
              this.getUsers(page);
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