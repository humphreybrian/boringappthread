<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Chama App</title>


    @include('shared.links')


</head>

<body>

    <div id="page-container">
        @include('shared.nav')
        @include('shared.header')
        @include('shared.aside')


        <!-- MAIN CONTAINER -->
        @yield('content')

        @include('shared.footer')
    </div>

    @include('shared.scripts')
</body>

<!-- Mirrored from html.alfisahr.com/prudence/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Feb 2019 00:47:42 GMT -->

</html>