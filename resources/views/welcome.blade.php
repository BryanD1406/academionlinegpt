<x-app-layout>
  <style>
    .py-36 {
      padding-top: 9rem;
      /* 144px */
      padding-bottom: 9rem;
      /* 144px */
    }

    .text-4xl {
      font-size: 2.441rem;
    }

    .w-search {
      width: 1rem;
    }

    .star {
      color: yellow;
    }
  </style>

  {{-- Portada --}}
  <section class="bg-cover h-auto sm:h-[90vh] flex  items-center justify-center my-20 sm:my-0">
    <div class="container text-white  grid grid-cols-1 sm:grid-cols-2 ">
      <img src="/img/blink.gif" alt=""
        class="object-contain  w-[300px] h-[300px] my-10 sm:w-[600px] sm:h-[600px] mx-auto" loading="lazy">
      <div class="w-full px-10 flex flex-col items-center justify-center">
        <h2 class="font-bold text-4xl w-full text-blue-950 mb-5">Domina las mejores tecnologias en</h2>
        <h2 class="font-bold text-xl lg:text-4xl w-full text-white">AcademiOnlineGpt.com</h2>
        <h1 class="text-lg mt-4 mb-6 font-bold text-sky-600">En AcademiOnlineGpt, ofrecemos cursos en linea sobre
          tecnologia y
          robótica para todas las edades. Desde niños curiosos hasta adultos innovadores, nuestra misión es
          enseñar habilidades tecnológicas clave de forma interactiva y accesible. ¡Prepárate para el futuro
          con nosotros!
        </h1>
        {{-- * Buscador --}}
        @livewire('search')

      </div>
    </div>
  </section>

  {{-- *Contacto --}}

  <section class="  py-12 grid grid-cols-1 lg:grid-cols-2 gap-4 items-center bg-black">
    <img class="object-cover mx-auto w-52 h-52 sm:w-96 sm:h-96 mb-10 rounded-xl"
      src="{{ asset('img/home/profesor.png') }}" alt="" loading="lazy">

    <div class="card-body p-8 bg-gradient">
      <h1 class="font-bold text-3xl mb-4 text-gray-100">Proveemos cursos de calidad con nuestros expertos</h1>
      <p class="text-gray-100 text-xl font-bold mt-2">Si tienes alguna pregunta, no dudes en hacérnoslo saber!</p>
      <p class="text-gray-100 text-xl font-bold mt-2">Dr. Maglioni Arana C</p>
      <p class="text-blue-200 text-xl font-bold mt-2">maxarana101@gmail.com</p>
    </div>
  </section>



  <section class="py-20 bg-gray-900">
    <h2 class="text-white text-center text-4xl mb-10">CONTENIDO</h2>

    <div
      class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-10">
      <article class="p-4 bg-black rounded-lg">
        <figure class="mb-10">
          <div class="relative rounded border-b-2 overflow-hidden" style="aspect-ratio: 16/9;">
            <img class="absolute inset-0 w-full h-full object-cover shadow-white"
              src="{{ asset('img/home/programacion.jpg') }}" alt="Programación para niños" loading="lazy">
          </div>
        </figure>
        <header class="mt-2 mb-4">
          <h1 class="text-center text-xl text-white">Programación para niños</h1>
        </header>
        <p class="text-sm text-white">
          Aprende los fundamentos de la programación de forma divertida y creativa.
        </p>
      </article>

      <article class="p-4 bg-black rounded-lg">
        <figure class="mb-10">
          <div class="relative rounded border-b-2 overflow-hidden" style="aspect-ratio: 16/9;">
            <img class="absolute inset-0 w-full h-full object-cover shadow-white"
              src="{{ asset('img/home/arduino.jpg') }}" alt="Robótica educativa" loading="lazy">
          </div>
        </figure>
        <header class="mt-2 mb-4">
          <h1 class="text-center text-xl text-white">Robótica educativa</h1>
        </header>
        <p class="text-sm text-white">
          Construye y programa robots mientras desarrollas habilidades prácticas.
        </p>
      </article>

      <article class="p-4 bg-black rounded-lg">
        <figure class="mb-10">
          <div class="relative rounded border-b-2 overflow-hidden" style="aspect-ratio: 16/9;">
            <img class="absolute inset-0 w-full h-full object-cover shadow-white"
              src="{{ asset('img/home/desarrollo-web.jpg') }}" alt="Desarrollo web" loading="lazy">
          </div>
        </figure>
        <header class="mt-2 mb-4">
          <h1 class="text-center text-xl text-white">Desarrollo web</h1>
        </header>
        <p class="text-sm text-white">
          Crea páginas web modernas con tecnologías como HTML, CSS y JavaScript.
        </p>
      </article>

      <article class="p-4 bg-black rounded-lg">
        <figure class="mb-10">
          <div class="relative rounded border-b-2 overflow-hidden" style="aspect-ratio: 16/9;">
            <img class="absolute inset-0 w-full h-full object-cover shadow-white" src="{{ asset('img/home/ia.png') }}"
              alt="Inteligencia Artificial" loading="lazy">
          </div>
        </figure>
        <header class="mt-2 mb-4">
          <h1 class="text-center text-xl text-white">Inteligencia Artificial</h1>
        </header>
        <p class="text-sm text-white">
          Descubre el poder de la IA y cómo aplicarla en proyectos reales.
        </p>
      </article>

      <article class="p-4 bg-black rounded-lg">
        <figure class="mb-10">
          <div class="relative rounded border-b-2 overflow-hidden" style="aspect-ratio: 16/9;">
            <img class="absolute inset-0 w-full h-full object-cover shadow-white"
              src="{{ asset('img/home/ciberseguridad.png') }}" alt="Ciberseguridad" loading="lazy">
          </div>
        </figure>
        <header class="mt-2 mb-4">
          <h1 class="text-center text-xl text-white">Ciberseguridad</h1>
        </header>
        <p class="text-sm text-white">
          Protege la información aprendiendo técnicas y herramientas de seguridad.
        </p>
      </article>

      <article class="p-4 bg-black rounded-lg">
        <figure class="mb-10">
          <div class="relative rounded border-b-2 overflow-hidden" style="aspect-ratio: 16/9;">
            <img class="absolute inset-0 w-full h-full object-cover shadow-white"
              src="{{ asset('img/home/realidad-aumentada.jpg') }}" alt="Realidad aumentada" loading="lazy">
          </div>
        </figure>
        <header class="mt-2 mb-4">
          <h1 class="text-center text-xl text-white">Realidad aumentada</h1>
        </header>
        <p class="text-sm text-white">
          Explora mundos virtuales y crea experiencias interactivas impresionantes.
        </p>
      </article>
    </div>
  </section>



  <section class=" bg-black  py-10 text-center">
    <h1 class="text-center text-white text-2xl font-bold">No sabes que curso llevar?</h1>
    <p class="text-center text-white mt-4 mb-10">Dirijete al catalogo de cursos y filtralos por categoria o nivel
    </p>
    <a href="{{ route('courses.index') }}"
      class=" p-4 group relative h-12 w-48 overflow-hidden rounded-2xl bg-green-500 text-lg font-bold text-white">
      Catalogo de cursos
      <div
        class="absolute inset-0 h-full w-full scale-0 rounded-2xl transition-all duration-300 group-hover:scale-100 group-hover:bg-white/30">
      </div>
    </a>
  </section>

  <section class="mt-24 py-10">
    <div class="px-10">
      <h1 class="text-center text-white text-2xl font-bold mb-1">ULTIMOS CURSOS</h1>
      <p class="text-center text-white text-lg mb-6">Trabajamos sin descanso para darte la mejor la calidad</p>
    </div>
    <div
      class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-10">
      @foreach ($courses as $course)
        {{-- *LLamamos al componente course-card que crearmos en la carpeta
            *public dentro de la carpeta components, y pasamos por parametro el valor del curso --}}
        <x-course-card :course="$course" />
      @endforeach
    </div>
    @if ($courses->isempty())
      <div class="flex items-center justify-center text-white w-full mt-20">
        <div class="mx-auto">
          <h4 class="text-3xl">Proximamente!</h2>
            <img src="/img/libro.png" alt="" class="w-40 h-40 object-cover  ">
        </div>
      </div>
    @endif
  </section>

</x-app-layout>
