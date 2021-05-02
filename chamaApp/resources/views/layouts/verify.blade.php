<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Chama App</title>
    @include('shared.links')
    @laravelPWA
</head>
<body>
    <div id="page-container">
        @include('shared.navv')
        @include('shared.header')
        @include('shared.aside')
        @yield('content')
        @include('shared.footer')
    </div>
    @include('shared.scripts')
</body>
</html>