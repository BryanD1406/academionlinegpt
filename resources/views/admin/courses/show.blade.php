<x-app-layout>

    <section class="bg-gray-700 py-10 text-white mb-20 ">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-10">
            <figure>
                @if ($curso->image)
                    <img class="h-60 w-full object-cover" src="{{ Storage::url($curso->image->url) }}" alt="Curso">
                @else
                    <img class="h-60 w-full object-cover"
                        src="https://cdn.pixabay.com/photo/2017/04/19/13/16/computer-2242264_1280.jpg" alt="Curso">
                @endif
            </figure>
            <div>
                <h1 class="text-4xl mb-3 text-bold">{{ $curso->title }}</h1>
                <h2 class="text-xl text-sm mb-3">{{ $curso->subtitle }}</h2>
                <p class="mb-2"><i class="mr-4 fas fa-chart-line"></i>{{ $curso->level->name }}</p>
                <p class="mb-2"><i class="mr-4 fas fa-chart-line"></i>Categoria: {{ $curso->category->name }}</p>
                <p class="mb-2"><i class="mr-4 fas fa-users text-blue-400"></i>Matriculados:
                    {{ $curso->students_count }}</p>
                <p class="mb-2"><i class="mr-4 fas fa-star text-yellow-400"></i>Calificacion: {{ $curso->rating }}</p>
            </div>
        </div>
    </section>

    {{-- *Grid --}}
    <div class="container grid grid-cols-1 text-white lg:grid-cols-3 gap-10">


        {{-- *Mensaje de error --}}
        @if (session('info'))
           <div class="lg:col-span-3" x-data="{open: true}" x-show="open">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Accion no permitida!</strong>
                <span class="block sm:inline">El curso esta incompleto, no puede ser aprobado aun</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg x-on:click="open = false"  class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div> 
           </div>
        @endif


        {{-- *Grid que ocupara dos espacios --}}
        <div class="order-2 lg:col-span-2 lg:order-1">
            {{-- *Lo que aprenderas --}}
            <section class="card py-0 mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">Lo que aprenderas</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-2 ">
                        @forelse($curso->goals as $goal)
                            <li class="text-gray-200 text-base"><i
                                    class="fas fa-check mr-4 text-green-400"></i>{{ $goal->name }}</li>
                        @empty
                            <li class="text-gray-200 text-base">Este
                                curso actualmente no tiene ninguna meta</li>
                        @endforelse
                    </ul>
                </div>
            </section>
            {{-- *Temario --}}
            <section class="mb-12">
                <h1 class="font-bold text-3xl mb-5">Temario</h1>
                @forelse ($curso->sections as $section)
                    <article class="mb-5 shadow-md shadow-white text-black rounded rounded-lg"` {{-- *Si es la primera ves que iteramos la variable contendra true --}}
                        {{-- *Si no false --}} {{-- *Recordar que con ALPINE creamos una variable la cual nos ayude a mostrar o ocultar una informacion --}}
                        @if ($loop->first) x-data="{ open: true }"
                        @else
                        x-data="{ open: false }" @endif>

                        <header class="border border-gray-200 px-2 py-3 cursor-pointer bg-gray-200 rounded rounded-lg"
                            x-on:click="open = !open">
                            <h1 class="font-bold text-lg text-gray-600 ml-4">{{ $section->name }}</h1>
                        </header>

                        <div class="bg-white py-2 px-4 rounded rounded-lg" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base text-gray-200 cursor-pointer"><i
                                            class="fas fa-play-circle mr-2"></i>{{ $lesson->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </article>

                @empty
                    <li class="text-gray-200 text-base">Este curso
                        actualmente no tiene ninguna seccion asignada</li>
                @endforelse
            </section>
            {{-- *Requisitos --}}
            <section class="mb-12">
                <h1 class="font-bold text-4xl mb-4">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @forelse ($curso->requirements as $requirement)
                        <li class="text-gray-100 text-base">{{ $requirement->name }}</li>
                    @empty
                        <li class="text-gray-200 text-base">Este curso
                            actualmente no tiene ningun requerimiento asignado</li>
                    @endforelse
                </ul>
            </section>
            {{-- *Descripcion --}}
            <section class="">
                <h1 class="font-bold text-4xl mb-4">Descripcion</h1>
                <div class="text-gray-100 text-base">
                    {!! $curso->description !!}
                </div>
            </section>
        </div>

        {{-- *Grid que ocupara el tercer espacio restante --}}
        <div class="order-1  lg:order-2">
            {{-- *Section datos del profesor y llevar curso --}}
            <section class="card py-0 mb-10">

                <div class="card-body">
                    {{-- *Section datos del profesor --}}
                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadow-md shadow-white"
                            src="{{ $curso->teacher->profile_photo_url }}" alt="{{ $curso->teacher->name }}">
                        <div class="ml-4">
                            <h1 class="font-bold text-white text-xl">Prof: {{ $curso->teacher->name }}</h1>
                            <a href="#"
                                class="text-blue-200 text-sm font-bold">{{ '@' . Str::slug($curso->teacher->name, '') }}</a>
                        </div>
                    </div>
                    {{-- *Boton --}}

                    {{-- * (Can) Verificar si el usuario puede ver este contenido --}}
                    {{-- * (Can) nombre del metodo de la policy en este caso enrolled --}}
                    {{-- * (Can) Pasamos por parametro el curso para luego comparar --}}

                    <form method="POST" class="mt-10" action="{{ route('admin.cursos.approved', $curso) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary w-full bg-blue-600">Aprobar este curso</button>
                    </form>

                    <a href="{{route('admin.cursos.observation', $curso)}}" class="btn btn-danger w-full block text-center mt-2 bg-red-500">Observar curso</a>

                </div>
            </section>


        </div>

    </div>


</x-app-layout>
