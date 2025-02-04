<x-app-layout>

    <section class="bg-gray-700 py-10 text-white mb-20 ">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-10">
            <figure>
                <img class="h-60 w-full object-cover" src="{{ Storage::url($curso->image->url) }}" alt="Curso">
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
        {{-- *Grid que ocupara dos espacios --}}
        <div class="order-2 lg:col-span-2 order-1">
            {{-- *Lo que aprenderas --}}
            <section class="card py-0 mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">Lo que aprenderas</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-2 ">
                        @foreach ($curso->goals as $goal)
                            <li class="text-gray-200 text-base"><i
                                    class="fas fa-check mr-4 text-green-400"></i>{{ $goal->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </section>
            {{-- *Temario --}}
            <section class="mb-12">
                <h1 class="font-bold text-3xl mb-5">Temario</h1>
                @foreach ($curso->sections as $section)
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
                @endforeach
            </section>
            {{-- *Requisitos --}}
            <section class="mb-12">
                <h1 class="font-bold text-4xl mb-4">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @foreach ($curso->requirements as $requirement)
                        <li class="text-gray-100 text-base">{{ $requirement->name }}</li>
                    @endforeach
                </ul>
            </section>
            {{-- *Descripcion --}}
            <section class="">
                <h1 class="font-bold text-4xl mb-4">Descripcion</h1>
                <div class="text-gray-100 text-base">
                    {!! $curso->description !!}
                </div>
            </section>
            {{-- *Reseñas --}}
            @livewire('courses-reviews', ['curso' => $curso])
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

                    @can('enrolled', $curso)
                        {{-- * (Can) SI ESTA MATRICULADOr --}}
                        <form action="{{ route('courses.enrolled', $curso) }}" method="POST">
                            @csrf
                            <a href="{{ route('courses.status', $curso) }}"
                                class="py-2 mt-4 w-full h-auto block p-5 text-center group relative h-12  overflow-hidden rounded-2xl bg-green-500 text-lg font-bold text-white">
                                Continuar curso
                                <div
                                    class="absolute inset-0 h-full w-full scale-0 rounded-2xl transition-all duration-300 group-hover:scale-100 group-hover:bg-white/30">
                                </div>
                            </a>
                        </form>
                    @else
                        @if ($curso->price->value == 0)
                            {{-- * (Can) SI NO ESTA MATRICULADOr --}}
                            <p class="my-2 text-gray-100 font-bold mb-4 mt-3">Gratis !!</p>
                            <form action="{{ route('courses.enrolled', $curso) }}" method="POST">
                                @csrf
                                <button
                                    class="py-2 mt-4 w-full h-auto block p-5 text-center group relative h-12  overflow-hidden rounded-2xl bg-green-500 text-lg font-bold text-white">
                                    LLevar este curso
                                    <div
                                        class="absolute inset-0 h-full w-full scale-0 rounded-2xl transition-all duration-300 group-hover:scale-100 group-hover:bg-white/30">
                                    </div>
                                </button>
                            </form>
                        @else
                            <p class="my-2 text-gray-100 font-bold mb-4 mt-3">{{ $curso->price->value }} USD</p>
                            <a href="{{ route('payment.checkout', $curso) }}"
                                class="py-2 mt-4 w-full h-auto block p-5 text-center group relative h-12  overflow-hidden rounded-2xl bg-green-500 text-lg font-bold text-white">Comprar
                                este curso</a>
                        @endif
                    @endcan


                </div>
            </section>

            {{-- *Cursos recomendados --}}
            <aside class="hidden lg:block">

                @foreach ($cursos_similares as $curso)
                    <article class="flex mb-6">
                        <img class="object-cover w-40 h-32" src="{{ Storage::url($curso->image->url) }}"
                            alt="">
                        <div class="ml-4">
                            <h1>
                                <a href="{{ route('courses.show', $curso) }}"
                                    class="font-bold text-gray-100">{{ Str::limit($curso->title, 40) }}</a>
                            </h1>
                            <div class="flex items-center mt-5 mb-4">
                                <img class="h-8 w-8 object-cover rounded-full shadow-md shadow-white"
                                    src="{{ $curso->teacher->profile_photo_url }}" alt="">
                                <p class="text-gray-700 text-sm ml-2 text-white">{{ $curso->teacher->name }}</p>
                            </div>
                            <p class="text-sm">
                                <i class="fas fa-star mr-2 text-yellow-400">{{ $curso->rating }}</i>
                            </p>
                        </div>
                    </article>
                @endforeach

            </aside>
        </div>

    </div>


</x-app-layout>
