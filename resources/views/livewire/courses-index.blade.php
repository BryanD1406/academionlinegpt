{{-- Alt trabajar con componentes se trabaja todo dentro de un div generico --}}

<div>
  <div class="bg-gray-200 py-4 mb-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-black py-4 text-gray-700 flex">
      <button class="bg-white shadow h-12 px-4 rounded-lg mr-10 h-10 mr-10" wire:click="resetFilters">
        <p>Todos los cursos</p>
      </button>
      <!-- component -->

      <!-- Dropdown  Categorias-->
      <div class="relative mr-10" x-data="{ open: false }">
        <button class="px-4 text-black block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow"
          x-on:click="open = true">
          Categoria
        </button>
        <!-- Dropdown Body -->
        <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
          x-on:click.away="open = false">
          @foreach ($categories as $category)
            <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white"
              wire:click="$set('category_id', {{ $category->id }})" x-on:click="open = false">{{ $category->name }}</a>
          @endforeach

        </div>
        <!-- // Dropdown Body -->
      </div>
      <!-- // Dropdown -->

      <!-- Dropdown Niveles -->
      <div class="relative mr-10" x-data="{ open: false }">
        <button class="px-4 text-black block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow"
          x-on:click="open = true">
          Niveles
        </button>
        <!-- Dropdown Body -->
        <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
          x-on:click.away="open = false">
          @foreach ($levels as $level)
            <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white"
              wire:click="$set('level_id', {{ $level->id }})" x-on:click="open = false">{{ $level->name }}</a>
          @endforeach
        </div>
        <!-- // Dropdown Body -->
      </div>
      <!-- // Dropdown -->

    </div>
  </div>


  {{-- Lista de cursos --}}
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


  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 mt-8">
    {{ $courses->links() }}
  </div>
</div>


</div>
