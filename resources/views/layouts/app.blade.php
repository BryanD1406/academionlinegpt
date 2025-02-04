<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{ asset('favicon/favicon.ico') }}" type="image/x-icon">
  <title>{{ config('app.name', 'Laravel') }}</title>

  {{-- * Fonts --}}
  <link rel="stylesheet" href="path/to/plyr.css" />
  <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
  <link rel="preconnect" href="https://fonts.bunny.net">
  {{-- <script src="https://unpkg.com/@paypal/paypal-js@8.0.0/dist/iife/paypal-js.min.js"></script> --}}
  <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID') }}"></script>
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
  {{-- *Font awesone v5.15.4 --}}
  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Styles -->
  @livewireStyles
</head>

<body class="font-sans antialiased">
  <x-banner />

  <div class="min-h-screen ">
    @livewire('navigation-menu')


    {{-- *En este apartado se cargara componentes dinamicos de livewire que hayan sido llamados desde el web.php usando su controlador --}}

    <main>
      {{ $slot }}
    </main>
  </div>

  @stack('modals')

  @livewireScripts

  @isset($js)
    {{ $js }}
  @endisset
</body>

</html>
