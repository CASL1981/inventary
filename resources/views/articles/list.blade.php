<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
<div class="full-width panel mdl-shadow--2dp">
  <div class="full-width panel-tittle bg-success text-center tittles">
    Listado de Productos
  </div>
  <div class="full-width panel-content">
    <form action="#">
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
        <label class="mdl-button mdl-js-button mdl-button--icon" for="searchAdmin">
          <i class="zmdi zmdi-search"></i>
        </label>
        <div class="mdl-textfield__expandable-holder">
          <input class="mdl-textfield__input" type="text" id="searchAdmin" v-model="search">
          <label class="mdl-textfield__label"></label>
        </div>
      </div>
    </form>
    <div class="mdl-list">
      <div v-for="article in filterArticle">
        <div class="mdl-list__item mdl-list__item--two-line">
          <span class="mdl-list__item-primary-content" >
            <i class="zmdi zmdi-truck mdl-list__item-avatar"></i>
            <span>@{{ article.description }} @{{ article.make }}</span>
            <span class="mdl-list__item-sub-title">UM @{{ article.um }} Stockminimo @{{ article.stockmin }} Stockmaximo @{{ article.stockmax }}</span>
          </span>                       
          <a class="mdl-list__item-secondary-action modal-trigger" href="#" @click.prevent="getEditar(article)"><i class="zmdi zmdi-more"></i></a>
        </div>
        <li class="full-width divider-menu-h"></li>
      </div>
    </div>
  </div>
</div>
<ul class="pagination">
    <li v-if="pagination.current_page > 1">
      <a href="#" @click.prevent="changePage(pagination.current_page - 1)">
        <span>Atras</span>
      </a>
    </li>

    <li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
      <a href="#" @click.prevent="changePage(page)">
        @{{ page }}
      </a>
    </li>

    <li v-if="pagination.current_page < pagination.last_page">
      <a href="#" @click.prevent="changePage(pagination.current_page + 1)">
        <span>Siguiente</span>
      </a>
    </li>
  </ul>
</div>