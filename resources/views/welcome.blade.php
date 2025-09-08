<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#111827">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اربور-حسابداری شخصی</title>
    @livewireStyles
{{--    @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
    @stack('styles')
    @vite('resources/css/auth/page-auth.css')
    @vite('resources/css/auth/core-dark.css')
    @vite('resources/css/auth/theme-default-dark.css')
    @vite('resources/css/auth/demo.css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="layout-wide customizer-hide dark-style">
<div class="center">
    <section class="hero">
        <div class="container">
            <div class="hero-inner">
                <div class="hero-copy">
                    <h1 class="hero-title mt-0">Erebor🏔️🐉 where your money finds its balance</h1>
                    <p class="hero-paragraph text-left">
                        Erebor is a simple yet powerful tool to help you manage your money with ease.
                        From tracking your accounts and transactions, to splitting shared expenses with friends, Erebor makes financial management stress-free.
                         Track your income and expenses in one place✅
                        <br/>
                        See all your accounts with clear balances ✅
                        <br/>
                         Split bills easily with friends no more confusion about who owes what ✅
                        <br/>
                         Get smart financial tips to save more and spend wisely✅
                        <br/>
                         Stay in control with a clean, user-friendly design✅
                        <br/>
                        Erebor is built to bring balance to your financial life — so you can focus on what really matters
                    </p>
                    <div class="hero-cta">

                        <a wire:navigate href="{{ route('register') }}" class="button button-shadow">Register</a>
                        <a class="button button-primary button-shadow" wire:navigate href="{{ route('login') }}">
                            Early access
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div>
    </div>

</div>
@livewireScripts
<script>
    if ("serviceWorker" in navigator) {
        navigator.serviceWorker.register("/service-worker.js")
            .then(() => console.log("Service Worker Registered!"));
    }
</script>
</body>
</html>

