@extends('home')

@section('desktop')
	<section class="pageContent" id="salidaID">
		<div class="mdl-grid">
			<div class="full-width panel-tittle bg-primary text-center tittles">
                Salidas de Productos
              </div>
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
		        
		        <div class="mdl-textfield mdl-js-textfield">
		            <select class="mdl-textfield__input" v-model="DATO.article_id" v-cloak>
		              <option v-for="article in articles" :value="article.id">
		              	@{{ article.description}}
            			@{{ article.um }}
		              </option>		              
		            </select>
		            <label class="mdl-textfield__label" for="area" id="labelABC">Selecione Articulo</label>
		        </div>
		    </div>
		    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--4-col-desktop">
		        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		            <input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" placeholder="Cantidad" 
		            v-model="DATO.output" @click="getSaldo(DATO.article_id)">
		            <span class="mdl-textfield__error">Campo Numerico</span>
		        </div>		        
		    </div>
		    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--2-col-desktop">
		        <p class="text-center">
			        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addAdmin" @click.prevent="storeSalida(DATO)">
			            <i class="zmdi zmdi-plus"></i>
			        </button>				    
				    <div class="mdl-tooltip" for="btn-addAdmin">Add Articulo</div>
				</p>
		    </div>
		</div>	
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
				<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
					<thead>
						<tr>
							<th class="mdl-data-table__cell--non-numeric">Producto</th>
							<th>Cantidad</th>							
							<th>Options</th>
						</tr>
					</thead>
					<tbody>						
						<tr v-for="salida in salidas">
						    <template v-if="! salida.editing">
			                    <td class="mdl-data-table__cell--non-numeric">@{{ salida.article.description }}</td>
			                    <td>@{{ salida.output }}</td>			                    
			                    <td>
			                        <a href="#" @click.prevent="editSalida(salida)"><span class="zmdi zmdi-edit"></span></a>
			                        <a href="#" @click.prevent="deleteSalida(salida)"><span class="zmdi zmdi-delete"></span>
			                        </a>
			                    </td>			                    
			                </template>
			                <template v-else>
			                    <td><input type="text" v-model="salida.article.description" disabled="true" class="mdl-textfield__input"></td>
			                    <td><input type="number" v-model="draft.output">
			                    <ul v-if="errorsEdit && errorsEdit.length" class="text-danger">
									<li v-for="error of errorsEdit">@{{error.description[0]}}</li>
							    </ul>
			                    </td>
			                    <td>
			                    	<a href="#" @click.prevent="updateSalida(salida, draft)"><span class="zmdi zmdi-check" ></span></a>
			                    	<a href="#" @click.prevent="cancel(salida)"><span class="zmdi zmdi-close"></span></a>
			                    </td>			                    
			                </template>
			            </tr>			
					</tbody>
				</table>
				<ul class="pagination" v-show="pagination.last_page > 1" v-cloak>
				    <li v-if="pagination.current_page > 1">
				      <a href="#" @click.prevent="changePage(pagination.current_page - 1)">
				        <span>Atras</span>
				      </a>
				    </li>

				    <li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
				      <a href="#" @click.prevent="changePage(page)" v-text="page"></a>
				    </li>

				    <li v-if="pagination.current_page < pagination.last_page">
				      <a href="#" @click.prevent="changePage(pagination.current_page + 1)">
				        <span>Siguiente</span>
				      </a>
				    </li>
				</ul>
				</br>
				@if (auth()->user()->role != 'normal')
					<p class="text-center">
			    		<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" @click.prevent="updateOutput()">
					    <i class="zmdi zmdi-check"></i>
					    </button>				    
					    <div class="mdl-tooltip" for="btn-addAdmin">Aprobar Salidas</div>
				  	</p>					
				@endif
				</div>
			</div>
		</div>
	</section>
@endsection

@section('script')
	
	  {{-- styde.net --}}
	<script type="text/javascript">
		
		var vm = new Vue({
		    el: '#salidaID',
		    created: function(){
		    	this.getSalidas();
		    	this.getArticles();
		    },
		    
		    data: {
		    	DATO: [],
		        salidas: [],
		        saldo: 0,
		        articles:[],
		        errorsEdit: [],
		        errorsStore: [],
		        draft: {},
		        pagination: {
		        	'total': 0,
			        'current_page': 0,
			        'per_page': 0,
			        'last_page': 0,
			        'from': 0,
			        'to': 0
			    },
		        offset: 3
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
		        }
		    },
		    methods: {
		    	getSalidas: function(page){		    		
		    		var url = '/salida/list?page='+page;
	                axios.get(url).then(response => {                        
						this.salidas    = response.data.inventory.data,
						this.pagination = response.data.pagination
                    });
		    	},
		    	getSaldo: function (id) {
		    		var url = '/inventario/saldo/' + id;
					axios.get(url).then(response => {						
						this.saldo = response.data
					});
		    	},
		    	getArticles: function(){		    		
		    		var url = '/article/list';
	                axios.get(url).then(response => {                        
                        this.articles = response.data
                    });
		    	},
		        deleteSalida: function (salida) {
		        	this.errorsEdit = [];
		        	this.errorsStore = [];
		        	var url = '/inventory/' + salida.id;
					axios.delete(url).then(response => {
						this.getSalidas();
						toastr.success('Eliminado correctamente')
					});
		        },
		        editSalida: function (salida) {
		        	this.errorsEdit = [];
		        	this.errorsStore = [];
		        	this.draft = $.extend({}, salida);		        	
		            Vue.set(salida, 'editing', true);
		        },
		        cancel: function(salida){
		        	salida.editing = false;
		        },
		        storeSalida: function (DATO) {
		        	var url = '/inventory';
		        	this.errorsStore = [];
		        	let saldo = this.saldo;

		        	if ( saldo < DATO.output) {
		        		toastr.error('Cantidad Ingresada es Mayor que saldo Disponible, SALDO: ' + this.saldo);
		        	}else{
			        	axios.post(url, {
			        		input: 0,
			        		output: DATO.output,
			        		article_id: DATO.article_id
			        	}).then(response => {
			        		this.getSaldo(DATO.article_id)
			        		toastr.success('Articulo Descargado correctamente, nuevo SALDO: ' + (this.saldo - DATO.output));
			        		DATO.output = '';
			        		DATO.article_id = '';		        		
							this.getSalidas()
			        	}).catch(e => {			            	
			            	console.log(e.response);
			            });		        		
		        	}
		        },
		        updateSalida: function (salida, draft) {		            
		            var url = '/inventory/' + draft.id;
		            this.errors = [];
		            axios.put(url, {
		            	input: 0,
		        		output: draft.output,
		        		article_id: draft.article_id
		            }).then(response => {		            	
						toastr.success('Articulo. actualizado correctamente');
						this.getSalidas()
		            }).catch(e => {
		            	this.errorsEdit = [];
		            	this.errorsEdit.push(e.response.data);
		            });
		        },
		        updateOutput: function(){
		        	var url = '/inventario/approveoutput/';
		            
		            axios.get(url).then(response => {		            	
						toastr.success('Todos los articulos fueron aprovados. ');
						this.getSalidas()
		            }).catch(e => {
		            	toastr.error('Error al aprovar los articulos. ');
		            });
		        },
	            changePage: function(page) {
	              this.pagination.current_page = page;
	              this.getSalidas(page);
	            }
		    }
		});
	</script>
@endsection