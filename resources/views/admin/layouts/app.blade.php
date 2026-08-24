<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Admin Panel')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-800">

<div class="min-h-screen flex">

    <x-admin.sidebar />

    <div class="flex-1 flex flex-col">

        <x-admin.header />

        <main class="p-6">

            <x-admin.alert />

            @yield('content')

        </main>

    </div>

</div>

</body>

</html>