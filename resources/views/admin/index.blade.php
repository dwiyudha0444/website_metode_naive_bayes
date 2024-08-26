@include('admin.head')

<body>
    <div class="container-scroller">
        @include('admin.navbar')

        <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
            @include('admin.sidebar')

            @yield('content')
        </div>
        </div>
        @include('admin.footer')

        @include('admin.script')
    </div>
</body>

</html>
