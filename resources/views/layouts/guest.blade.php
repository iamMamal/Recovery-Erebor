<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حسابداری شخصی اربور</title>
    @livewireStyles
    {{--    @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
    @stack('styles')
    @vite('resources/css/fonts/fontawesome.css')
    @vite('resources/css/auth/page-auth.css')
    @vite('resources/css/auth/core-dark.css')
    @vite('resources/css/auth/theme-default-dark.css')
    @vite('resources/css/auth/demo.css')
</head>
<body class="layout-wide customizer-hide dark-style">
<div>
    {{ $slot }}
</div>
@livewireScripts
</body>
</html>
