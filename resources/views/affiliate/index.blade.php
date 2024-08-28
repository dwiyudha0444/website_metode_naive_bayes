@include('affiliate.head')

<body>
    <div class="container-scroller">
        @include('admin.navbar')

        <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
            @include('affiliate.sidebar')

            @yield('content')
        </div>
        </div>
        @include('affiliate.footer')

        @include('affiliate.script')
    </div>
</body>

</html>
