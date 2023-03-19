<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.index.header')
</head>
    <body id="page-top">

    <div id="wrapper">
        @include('includes.index.sidebar')

        <div id="content-wrapper" class="d-flex flex-column min-vh-100">
            <!-- Main Content -->
            <div id="content">
                @include('includes.index.topbar')

                <!-- Bigin Page Content -->
                <div class="container-fluid">


                        <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                                @endif
                            @endforeach
                        </div>


                    @yield('content')
                </div>
            </div>
            @include('includes.index.footer')
        </div>
    </div>
        @include('includes.index.scrolltotop')
        @include('includes.index.logout')
        @include('includes.index.script')
    </body>

</html>
