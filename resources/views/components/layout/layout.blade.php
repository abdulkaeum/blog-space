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
    <section class="px-6 py-8">

        <x-layout.nav/>

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            {{ $slot }}
        </main>

        <x-layout.footer/>
    </section>
</body>
