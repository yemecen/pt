<div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar-brand" href="{{ route('logout') }}" 
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    
                    @if (Auth::user())
                        {{Auth::user()->name }} - Çıkış
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endif                
            </a>
            <form class="form-inline">
              <input class="form-control mr-sm-2" type="search" placeholder="Cm ID veya başlık..." aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Ara</button>
            </form>
        </nav>
    </div>
</div>
<br>