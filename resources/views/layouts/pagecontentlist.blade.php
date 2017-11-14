@extends('home')

@section('desktop')

<!-- pageContent -->
<section class="full-width pageContent">
        <div class="mdl-tabs__panel" id="tabListAdmin">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                    <div class="full-width panel mdl-shadow--2dp">
                        @yield('listItem')                            
                    </div>
                </div>
            </div>
        </div>            
        
    </div>
</section>

@endsection