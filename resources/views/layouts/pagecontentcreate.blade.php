@extends('home')

@section('desktop')

<!-- pageContent -->
<section class="full-width pageContent">    
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">        
        <div class="mdl-tabs__panel is-active" id="tabNewAdmin">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                    <div class="full-width panel mdl-shadow--2dp">
                        @include('partials/errors')
                        @yield('formcreate')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection