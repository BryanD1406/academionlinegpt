<x-app-layout>


  {{-- Portada --}}
  <section class="bg-cover" style="background-image: url({{ asset('img/courses/course.jpg') }})">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white py-36">
      <div class="w-full md:w-3/4 lg:w-1/2">
        <h1 class="font-bold text-4xl">Aqui podras visualizar la lista de cursos</h1>
        <p class="text-lg mt-4 mb-6">En nuestra plataforma encontrarás cursos actualizados, impartidos por expertos en
          diversas áreas, con contenido práctico y accesible desde cualquier lugar. Nuestra meta es ayudarte a alcanzar
          tus objetivos y maximizar tu potencial de aprendizaje.
        </p>
        {{-- * Buscador --}}
        @livewire('search')
      </div>
    </div>
  </section>

  @livewire('courses-index')
</x-app-layout>
