{{-- *LLamamos a la tabla que creamos --}}
<x-table-responsive>
    <div class=" flex items-center justify-between pb-6">
        <div>
            {{-- <p class="mb-4 font-bold"> Bienvenido profesor: {{$cursos[0]->teacher->name}}</p> --}}
            <h2 class="text-gray-600 font-semibold"></h2>
            <span class="text-xs">Todos los cursos registrados</span>

        </div>

    </div>
    <div class="px-6 py-4">
        <div class="card-header flex">
            <input wire:keydown="limpiar_page" wire:model.live="search" class="form-control flex-1 shadow-sm" type="search"
                name="search" placeholder="Buscar curso" autocomplete="off">

            <a class="btn bg-green-500 border-2 rounded-2xl text-gray-700 font- bold shadow-lg ml-2"
                href="{{ route('instructor.cursos.create') }}">Crear nuevo curso</a>
        </div>
    </div>

    @if ($cursos->count())



        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Nombre
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Matriculados
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Calificacion
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Status
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cursos as $curso)
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10">
                                    @isset($curso->image)
                                        <img class="w-full h-full rounded-full object-cover object-center" src="{{ Storage::url($curso->image->url) }}"
                                            alt=""/>
                                    @else
                                        <img class="w-full h-full rounded-full object-cover object-center" src="https://cdn.pixabay.com/photo/2017/04/19/13/16/computer-2242264_1280.jpg"
                                            alt=""/>
                                    @endisset
                                </div>
                                <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $curso->title }}
                                    </p>
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $curso->category->name }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $curso->students_count }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $curso->rating }}
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">


                                @switch($curso->status)
                                    @case(1)
                                        <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                        <span class="relative">
                                            En borrador
                                        </span>
                                    @break

                                    @case(2)
                                        <span aria-hidden class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full"></span>
                                        <span class="relative">
                                            En revision
                                        </span>
                                    @break

                                    @case(3)
                                        <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative">
                                            Publicado
                                        </span>
                                    @break

                                    @default
                                @endswitch


                            </span>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                <a href="{{ route('instructor.cursos.edit', $curso) }}">Editar</a>
                            </p>
                        </td>

                    </tr>
                @endforeach



            </tbody>
        </table>

        <div class="px-6 py-4 text-white">
            {{ $cursos->links() }}
        </div>
    @else
        <div class="px-6 py-4">
            No hay ningun curso encontrado
        </div>
    @endif
</x-table-responsive>
