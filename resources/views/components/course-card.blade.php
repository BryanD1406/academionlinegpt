{{-- *Creamos un componente para re3utilizarlo en distintas partes de nuestras vistas
    *asi si hay algun cambio podemos realizarlo aqui y se vera reflejado en distintas 
    *partes de nuestra aplicacion en lugar de cambiar uno por uno --}}


{{-- *Indicamos que le pasaremos un valor a este componente, debido a que este
    *esta usando la variable course y asi no nos de error --}}

@props(['course'])



<article class="card bg-indigo-500 border-2 border-white rounded-2xl">
  <img src="{{ Storage::url($course->image->url) }}" alt=""
    class="rounded border-b-2 shadow-2xl  h-100  w-full object-cover">
  <div class="card-body">
    <div class="h-10">
      <h1 class="card-title">
        {{ Str::limit($course->title, 40) }}</h1>
    </div>
    <p class="py-10 p-2 text-white text-sm ">Instructor: {{ $course->teacher->name }} </p>
    <div class="flex mb-5">
      <ul class="flex text-sm">
        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'white' : 'black' }}"></i>
        </li>
        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 2 ? 'white' : 'black' }}"></i>
        </li>
        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 3 ? 'white' : 'black' }}"></i>
        </li>
        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 4 ? 'white' : 'black' }}"></i>
        </li>
        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating == 5 ? 'white' : 'black' }}"></i>
        </li>
      </ul>

      <p class="text-sm text-white ml-auto"><i class="fas fa-users"></i>({{ $course->students_count }})</p>
    </div>

    @if ($course->price->value == 0)
      <p class="my-2 text-green-400 font-bold mb-4">Gratis !!</p>
    @else
      <p class="my-2 text-gray-100 font-bold mb-4">{{ $course->price->value }} USD</p>
    @endif


    <a href="{{ route('courses.show', $course) }}"
      class="w-full h-auto block p-5 text-center group relative h-12  overflow-hidden rounded-2xl bg-green-500 text-lg font-bold text-white">
      Mas informacion
      <div
        class="absolute inset-0 h-full w-full scale-0 rounded-2xl transition-all duration-300 group-hover:scale-100 group-hover:bg-white/30">
      </div>
    </a>


  </div>
</article>
