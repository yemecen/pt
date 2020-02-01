<!doctype html>
<html lang="en">
    <head>
        @include('layouts.partials.head')
    </head>
    <body>
        <div class="container">
            @include('layouts.partials.navbar')

            <div class="row">
                @include('layouts.partials.sidebar')       
            
                <div class="col-md-9">

                    @yield('content')
                    
                </div>
            </div>
        </div>

        @include('layouts.partials.script')
    </body>
</html>