{{-- * BUSCADOR --}}
<form class="pt-2 relative mx-auto text-black w-full" autocomplete="off">
  <input wire:model.live="search"
    class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none " type="search"
    name="search" placeholder="Search">

  <button type="submit"
    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2">
    Buscar
  </button>

  @if ($search)
    <ul class="absolute left-0 w-full bg-white mt-1 rounded-lg overflow-hidden z-10">

      {{-- *Un for else permite indicar mostrar en caso de que existe un valor, en caso no no muestra nada --}}
      @forelse ($this->results as $result)
        <a class="leading-10 px-5 text-sm cursor-pointer hover:bg-blue-300 block"
          href="{{ route('courses.show', $result) }}">{{ $result->title }}</a>
      @empty
        <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-blue-300">No hay ninguna coincidencia :C</li>
      @endforelse

    </ul>
  @endif

</form>
