@extends('home')

@section('desktop')

<section class="full-width pageContent">    
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
      <div class="mdl-tabs__tab-bar">
        <a href="#tabNew" class="mdl-tabs__tab is-active" v-if="viewlabel" >NUEVO</a>
        <a href="#tabNew" class="mdl-tabs__tab is-active" v-else v-cloak>MODIFICAR</a>
        <div v-else>
          {{-- <a href="#" class="mdl-tabs__tab is-active" v-cloak @click.prevent="deleteArticle(datos)">ELIMINAR</a> --}}
        </div>
        <a href="#tabList" class="mdl-tabs__tab" v-show="viewlabel">LISTADO</a>
      </div>
      <div class="mdl-tabs__panel is-active" id="tabNew">
        <div class="mdl-grid">
          <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
            <div class="full-width panel mdl-shadow--2dp">
              <div class="full-width panel-tittle bg-primary text-center tittles" v-show="viewlabel">
                Crear Productos
              </div>
               @include('articles.form')
            </div>
          </div>
        </div>
      </div>
      <div class="mdl-tabs__panel" id="tabList" v-cloak v-show="viewlabel">
        <div class="mdl-grid">
          @include('articles.list')
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
        this.getArticles();
        this.getProviders();
      },
      data: {
        articles:[],
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
        filterArticle() {
          return this.articles.filter((article) => article.description.includes(this.search));
        }
      },
      methods: {
        getArticles(page){
          var url = '/article?page='+page;
          axios.get(url).then(response => {
            this.articles = response.data.articles.data,
            this.pagination = response.data.pagination
          });
        },
        getProviders(){
          let url = '/provider/list'
          axios.get(url).then(response  => {
            this.providers = response.data;
          })
        },
        storeArticle(datos) {              
              var url = '/article';
              axios.post(url, {                
                description: datos.description,
                make: datos.make,
                provider_id: datos.provider_id,
                um: datos.um,
                ABC: datos.ABC,
                stockmin: datos.stockmin,
                stockmax: datos.stockmax
              }).then(response => {
                toastr.success('Articulo creado correctamente');               
                datos.description = '';
                datos.make = '';
                datos.provider_id = '';
                datos.um = '';
                datos.ABC = '';
                datos.stockmin = '';
                datos.stockmax = '';
                this.viewlabel = true;
                this.getArticles()
              }).catch(e => { 
                // this.errorsStore = [];
                //   this.errorsStore.push(e.response.data);
                });
            },
          getEditar(article) {
            var url = '/article/' + article.id + '/edit';
            axios.get(url).then(response => {
              this.viewlabel = false;
              this.datos = response.data;              
            });
          },
          updateArticle(datos) {              
              var url = '/article/' + datos.id;
              axios.put(url, {
                description: datos.description,
                make: datos.make,
                provider_id: datos.provider_id,
                um: datos.um,
                ABC: datos.ABC,
                stockmin: datos.stockmin,
                stockmax: datos.stockmax
              }).then(response => {
                toastr.success('Articulo actualizado correctamente');               
                datos.description = '';
                datos.make = '';
                datos.provider_id = '';
                datos.um = '';
                datos.ABC = '';
                datos.stockmin = '';
                datos.stockmax = '';               
                this.viewlabel = true;
                this.getArticles()
              }).catch(e => { 
                // this.errorsStore = [];
                //   this.errorsStore.push(e.response.data);
                });
            },
            deleteArticle(datos){
              var url = '/article/' + datos.id;              
              axios.delete(url).then(response => {
                this.getArticles();
                this.viewlabel = true;
                toastr.success('Eliminado correctamente')
              });
            },
            changePage: function(page) {
              this.pagination.current_page = page;
              this.getArticles(page);
            }
      }
    })
  </script>
@endsection