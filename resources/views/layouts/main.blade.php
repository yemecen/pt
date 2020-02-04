<!doctype html>
<html lang="en">
    <head>
        @include('layouts.partials.head')
    </head>
    <body>
        <div class="container-fluid ">
            @include('layouts.partials.navbar')

            <div class="row">
                @include('layouts.partials.sidebar')       
            
                <div class="col-md-10">

                    @yield('content')
                    
                </div>
            </div>
        </div>

        @include('layouts.partials.script')
    </body>
</html>