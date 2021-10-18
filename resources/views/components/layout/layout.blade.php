<!doctype html>

<head>
    <title>Blog Space</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        .scroll-hidden::-webkit-scrollbar {
            height: 0px;
            background: transparent; /* make scrollbar transparent */
        }
    </style>
</head>

<body style="font-family: Open Sans, sans-serif">

    @include('_partials._flash')

    @if(request()->routeIs('login.create') || request()->routeIs('register.create'))
        {{ $slot }}
    @else
        <section class="px-6 py-8">
            @include('_partials._nav')

            <main class="max-w-6xl mx-auto mt-2 lg:mt-2 space-y-6">
                {{ $slot }}
            </main>

            <x-layout.footer/>
        </section>
    @endif

    <!-- AlpineJS -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
                integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

</body>
