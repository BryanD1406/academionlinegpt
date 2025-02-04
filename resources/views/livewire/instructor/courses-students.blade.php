<div>
    {{-- <x-slot name="curso">
        {{ $curso->slug }}
    </x-slot> --}}

    <h1 class="text-2xl font-bold mb-4 text-white">Estudiantes del curso</h1>

    <x-table-responsive>
        <div class=" flex items-center justify-between pb-6">
            <div>
                {{-- <p class="mb-4 font-bold"> Bienvenido profesor: {{$cursos[0]->teacher->name}}</p> --}}
                <h2 class="text-gray-600 font-semibold"></h2>
                <span class="text-xs">Todos los estudiantes registrados</span>

            </div>

        </div>
        <div class="px-6 py-4">
            <div class="card-header flex">
                <input wire:model.live="search" class="form-control flex-1 shadow-sm"
                    type="search" name="search" placeholder="Buscar estudiante" autocomplete="off">
            </div>
        </div>

        @if ($students->count())



            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Email
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">

                                        <img class="w-full h-full rounded-full object-cover object-center"
                                            src="{{ $student->profile_photo_url }}" alt="" />

                                    </div>
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $student->name }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $student->email }}</p>
                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>

            <div class="px-6 py-4 text-white">
                {{ $students->links() }}
            </div>
        @else
            <div class="px-6 py-4">
                No hay ningun estudiante encontrado
            </div>
        @endif
    </x-table-responsive>

</div>
