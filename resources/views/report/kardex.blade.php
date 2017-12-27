@extends('home')

@section('desktop')
	
	<section class="full-width pageContent" id="kardex">
		<section class="full-width header-well">
			<div class="full-width panel-tittle bg-primary text-center tittles">
                Selecione un Producto
            </div>
            <center>
		      	<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
			        <label class="mdl-button mdl-js-button mdl-button--icon" for="searchAdmin">
			          <i class="zmdi zmdi-search"></i>
			        </label>
			        <div class="mdl-textfield__expandable-holder">
						<select class="mdl-textfield__input" v-model="DATO" id="searchAdmin" 
						@Change="searchArticle(DATO)">
			              <option v-for="article in articles" :value="article.id">
			              	@{{ article.description}}		        			
			              </option>		              
			            </select>
			            <label class="mdl-textfield__label" for="area" id="labelABC">Selecione Articulo</label>		          
			        </div>
			    </div>            	
            </center>
		</section>
		<div class="mdl-grid">
	        <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">	            
	            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">        
					<span>Marca: <span v-text="article.make"></span></span>	                
	            </div>
	            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
	                <span>Tipo: <span v-text="article.ABC"></span></span>
	            </div>
	            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
	                <span>Unidad Medida: <span v-text="article.um"></span></span>
	            </div>
	            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
	            	<span>Estado: <span v-text="article.status"></span></span>    
	            </div>
	        </div>
	        <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">	            
	            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
	                <span>Saldo Inicial: <span v-text="article.residue"></span></span>
	            </div>
	            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
	                <span>Total Entradas: <span v-text="saldo.Entrada"></span></span>
	            </div>
	            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
	                <span>Total Salidas: <span v-text="saldo.Salida"></span></span>
	            </div>
	            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
	                <span>Saldo Final: <span v-text="saldo.saldoFinal"></span></span>
	            </div>
	        </div>
	    </div>		
		<div class="full-width panel-content">			
		    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
				<thead>
					<tr>
						<th class="mdl-data-table__cell--non-numeric">Date</th>
						<th>Entradas</th>
						<th>Salidas</th>							
					</tr>
				</thead>
				<tbody>
					<tr v-for="item in inventories">
						<td class="mdl-data-table__cell--non-numeric" v-text="item.created_at"></td>
						<td v-text="item.input"></td>
						<td v-text="item.output"></td>
					</tr>
					
				</tbody>
			</table>
		<ul class="pagination" v-cloak>
		    <li v-if="pagination.current_page > 1">
		      <a href="#" @click.prevent="changePage(pagination.current_page - 1, DATO.article_id)">
		        <span>Atras</span>
		      </a>
		    </li>

		    <li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
		      <a href="#" @click.prevent="changePage(page, DATO)" v-text="page"></a>
		    </li>

		    <li v-if="pagination.current_page < pagination.last_page">
		      <a href="#" @click.prevent="changePage(pagination.current_page + 1, DATO)">
		        <span>Siguiente</span>
		      </a>
		    </li>
		</ul>
		</div>
	</section>
@endsection

@section('script')
	
	  {{-- styde.net --}}
	<script type="text/javascript">
		
		var vm = new Vue({
		    el: '#kardex',
		    created: function(){
		    	//this.getKardex();	    	
		    	this.getArticles();
		    },
		    
		    data: {
		    	DATO: [],
		        article: [],
		        saldo: [],
		        inventories: [],
		        articles:[],
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
		    	getKardex(page, id){
		          var url = '/kardex?page='+page+'&id='+id;
		          axios.get(url).then(response => {
					this.inventories = response.data.kardex.data,
					this.pagination  = response.data.pagination
		          });
		        },
		    	searchArticle: function(id){		    		
		    		var url = '/kardex/'+id;
					this.getKardex(1, id);

	                axios.get(url).then(response => {						
						this.article     = response.data.article,
						this.saldo       = response.data.saldo
                    });
		    	},
		    	getArticles: function(){		    		
		    		var url = '/article/list';
	                axios.get(url).then(response => {                        
                        this.articles = response.data
                    });
		    	},
	            changePage: function(page) {
	              this.pagination.current_page = page;
	              this.getKardex(page, this.DATO);
	            }
		    }
		});
	</script>
@endsection