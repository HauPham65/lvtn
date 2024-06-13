<!DOCTYPE html>
<html lang="en">

<head>
    @include('interface.widgets.head')
</head><!--/head-->

<body>
    <!--header-->
    @include('interface.widgets.header')
    <!--/header-->


    @yield('content')
    <!--Footer-->
    @if (!isset($showFooter) || $showFooter)
        @include('interface.widgets.footer')
    @endif
    <!--/Footer-->


    {{-- js --}}
    @include('interface.widgets.js')
    {{-- /js --}}
    @stack('js')

</body>

</html>
