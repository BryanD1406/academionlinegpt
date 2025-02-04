<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{ asset('favicon/favicon.ico') }}" type="image/x-icon">
  <title>AcademiOnlineGpt</title>

  {{-- * Fonts --}}
  <link rel="stylesheet" href="path/to/plyr.css" />
  <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
  <link rel="preconnect" href="https://fonts.bunny.net">
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

    <div class="container py-8 grid grid-cols-5 text-white">
      {{-- * Menu de opciones --}}
      <aside>
        <h1 class="font-bold text-lg  mb-4">Edicion del curso</h1>
        <ul class="text-sm text-gray-100">
          <li
            class="leading-7 mb-1 border-l-4 @routeIs('instructor.cursos.edit', $curso) border-indigo-400
@else
border-transparent @endif pl-2">
            <a href="{{ route('instructor.cursos.edit', $curso) }}">Informacion del curso</a>
          </li>
          <li
            class="leading-7 mb-1 border-l-4 @routeIs('instructor.cursos.curriculum', $curso) border-indigo-400
@else
border-transparent @endif pl-2">
            <a href="{{ route('instructor.cursos.curriculum', $curso) }}">Lecciones del curso</a>
          </li>
          <li
            class="leading-7 mb-1 border-l-4 @routeIs('instructor.cursos.goals', $curso) border-indigo-400
@else
border-transparent @endif pl-2">
            <a href="{{ route('instructor.cursos.goals', $curso) }}">Metas del curso</a>
          </li>
          <li
            class="leading-7 mb-1 border-l-4 @routeIs('instructor.cursos.students', $curso) border-indigo-400
@else
border-transparent @endif pl-2">
            <a href="{{ route('instructor.cursos.students', $curso) }}">Estudiantes</a>
          </li>

          @if ($curso->observation)
            <li
              class="leading-7 mb-1 border-l-4 @routeIs('instructor.cursos.observation', $curso) border-indigo-400
@else
border-transparent @endif pl-2">
              <a href="{{ route('instructor.cursos.observation', $curso) }}">Observaciones</a>
            </li>
          @endif
        </ul>

        @switch($curso->status)
          @case(1)
            <form action="{{ route('instructor.cursos.status', $curso) }}" method="POST">
              @csrf

              <button type="submit" class="btn btn-danger bg-red-800 mt-10">Solicitar revision</button>
            </form>
          @break

          @case(2)
            <div class="card text-black font-bold bg-sky-300 py-0 mr-5 mt-10">
              <div class="card-body py-4">
                Este curso se encuentra en revision
              </div>
            </div>
          @break

          @case(3)
            <div class="card text-white font-bold bg-green-500 py-0 mr-5 mt-10">
              <div class="card-body py-4">
                Este curso se encuentra publicado
              </div>
            </div>
          @break

          @default
        @endswitch




      </aside>

      <div class="col-span-4 card bg-orange-900 border-4 border-black">
        <main class="card-body  text-black bg-green-700 p-4">
          {{ $slot }}
        </main>
      </div>
    </div>
  </div>

  @stack('modals')

  @livewireStyles

  @isset($js)
    {{ $js }}
  @endisset
</body>

</html>
