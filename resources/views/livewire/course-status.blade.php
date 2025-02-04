{{-- *Este componente se puede visualizar en el archivo app.blade.php en slot --}}
<div class="mt-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 w-full">
            {{-- *Al colocarle !! al inicio y al final especificamos que el codigo html es seguro y que puede mostrarlo --}}
            <div class="embed-responsive">
                {!! $current->iframe !!}
            </div>


            {{-- * Div fallido video 
                <div class="container-video">
                <video controls crossorigin playsinline
                    poster="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg">
                    <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4"
                        size="576">
                    <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4" type="video/mp4"
                        size="720">
                    <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4"
                        type="video/mp4" size="1080">

                    <!-- Caption files -->
                    <track kind="captions" label="English" srclang="en"
                        src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt" default>
                    <track kind="captions" label="Français" srclang="fr"
                        src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt">
                    <!-- Fallback for browsers that don't support the <video> element -->
                    <a href="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4"
                        download>Download</a>
                </video>
            </div> --}}


            <h1 class="text-3xl text-white font-bold mt-4">
                {{ $current->name }}
            </h1>

            @if ($current->description)
                <div class="text-sm text-white font-bold mt-4 mb-5">
                    {{ $current->description->name }}
                </div>
            @endif

            <div class="flex justify-between mt-5 text-white">
                {{-- *Marcar como completado --}}
                <div class="flex items-center cursor-pointer" wire:click="completed">
                    @if ($current->completed)
                        <i class="fas fa-toggle-on text-2xl text-yellow-700"></i>
                    @else
                        <i class="fas fa-toggle-off text-2xl text-gray-700"></i>
                    @endif
                    <p class="text-sm ml-2">Marcar esta unidad como culminada</p>
                </div>

                @if ($current->resource)
                    <div class="flex items-center cursor-pointer"   wire:click="download">
                        <i class="fas fa-download text-lg text-gray-100"></i>
                        <p class="text-sm ml-2">Descargar recurso</p>
                    </div>
                @endif
            </div>

            <div class="card mt-5 py-0 mb-5">
                <div class="card-body flex text-gray-100 font-bold">
                    @if ($this->previous)
                        <a wire:click="changeLesson({{ $this->previous }})" class="cursor-pointer">Tema anterior</a>
                    @endif

                    @if ($this->next)
                        <a wire:click="changeLesson({{ $this->next }})" class="ml-auto cursor-pointer">Siguiente
                            tema</a>
                    @endif

                </div>
            </div>

        </div>

        {{-- *  --}}
        <div class="card">
            <div class="card-body">
                <h1 class="text-center text-white text-3xl mb-7 font-bold">{{ $curso->title }}</h1>
                {{-- *Section datos del profesor --}}
                <div class="flex items-center mb-7">
                    <img class="h-12 w-12 object-cover rounded-full shadow-md shadow-white"
                        src="{{ $curso->teacher->profile_photo_url }}" alt="{{ $curso->teacher->name }}">
                    <div class="ml-4">
                        <h1 class="font-bold text-white text-xl">Prof: {{ $curso->teacher->name }}</h1>
                        <a href="#"
                            class="text-blue-200 text-sm font-bold">{{ '@' . Str::slug($curso->teacher->name, '') }}</a>
                    </div>
                </div>
                {{-- *Barra de progreso --}}
                <p class="text-pink-200 text-sm mt-2">{{ $this->advance }}% completado</p>
                <div class="relative pt-1">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-pink-200">
                        <div style="width:{{ $this->advance }}%"
                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500 transition-all duration-500">
                        </div>
                    </div>
                </div>


                {{-- *Sections del curso --}}
                <ul class="mt-10 left-0 bg-white p-4 shadow-2xl shadow-white rounded-xl">
                    @foreach ($curso->sections as $section)
                        <li class="mt-2 mb-4 text-gray-400">
                            <a href="" class="font-bold mb-5 text-gray-700">{{ $section->name }}</a>
                            <ul class="mt-2 left-0">
                                @foreach ($section->lessons as $lesson)
                                    <div class="mt-3">

                                        <li class="mt-2 flex items-center">
                                            <div>

                                                @if ($lesson->completed)
                                                    @if ($current->id == $lesson->id)
                                                        <span
                                                            class="inline-block w-4 h-4 border-2 border-yellow-500 rounded-full mr-2 mt-1"></span>
                                                    @else
                                                        <span
                                                            class="inline-block w-4 h-4 bg-yellow-500 rounded-full mr-2 mt-1"></span>
                                                    @endif
                                                @else
                                                    @if ($current->id == $lesson->id)
                                                        <span
                                                            class="inline-block w-4 h-4 border-2 border-gray-500 rounded-full mr-2 mt-1"></span>
                                                    @else
                                                        <span
                                                            class="inline-block w-4 h-4 bg-gray-500 rounded-full mr-2 mt-1"></span>
                                                    @endif
                                                @endif
                                            </div>
                                            <a class="cursor-pointer" wire:click="changeLesson({{ $lesson }})">
                                                {{ $lesson->name }}
                                            </a>
                                        </li>
                                    </div>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</div>
