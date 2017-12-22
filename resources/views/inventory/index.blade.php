@extends('home')

@section('desktop')
	<section class="pageContent" id="salidaID">
		<div class="mdl-grid">
			<div class="full-width panel-tittle bg-primary text-center tittles">
                Inventario de Producto
            </div>			
		</div>

		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
				<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
					<thead>
						<tr>
							<th class="mdl-data-table__cell--non-numeric">Producto</th>
							<th>Saldo Inicial</th>
							<th>Entradas</th>
							<th>Salidas</th>
							<th>Saldo</th>
							<th>Estado</th>
						</tr>
					</thead>
					<tbody>						
						<tr v-for="inventory in inventories">
		                    <td class="mdl-data-table__cell--non-numeric" v-text="inventory.description"></td>
		                    <td v-text="inventory.residue"></td>
		                    <td v-text="inventory.Entrada"></td>
						    <td v-text="inventory.Salida"></td>
						    <td v-text="inventory.saldoFinal"></td>
						    <td v-text="inventory.status"></td>
			            </tr>			
					</tbody>
				</table>
				<ul class="pagination" v-show="pagination.total > 1" v-cloak>
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
		    	this.getInventory();
		    },
		    
		    data: {
		    	DATO: [],
		        inventories: [],
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
		    	getInventory: function(page){		    		
		    		var url = '/inventory?page='+page;
	                axios.get(url).then(response => {                        
                        this.inventories = response.data.inventory.data,
                        this.pagination = response.data.pagination
                    });
		    	},
	            changePage: function(page) {
	              this.pagination.current_page = page;
	              this.getInventory(page);
	            }
		    }
		});
	</script>
@endsection