<div>
    {{-- <x-slot name="curso">
        {{ $curso->slug }}
    </x-slot> --}}

    <div class="flex items-center justify-center w-full">
        <h1 class="text-2xl font-bold text-white">Lecciones del curso</h1>
        <img src="/img/pen-pencil.gif" class="object-contain w-20 h-20 flex-1" alt="">
    </div>
    <hr class="mt-2 mb-6">

    @foreach ($curso->sections as $item)
        <article class="card mb-1" x-data="{open: true}">
            <div class="card-body bg-gray-200 py-2 px-4">
                @if ($section->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="section.name" class="form-input w-full"
                            placeholder="Ingrese el nombre de la seccion">
                        @error('section.name')
                            <span class="text-xs text-red-700">{{ $message }}</span>
                        @enderror
                    </form>
                @else
                    <header class="flex justify-between items-center">
                        <h1 x-on:click="open = !open" class="cursor-pointer"><strong>Seccion:</strong> {{ $item->name }}</h1>
                        <div class="ml-3">
                            <i class="fas fa-edit cursor-pointer text-blue-400"
                                wire:click="edit({{ $item }})"></i>
                            <i class="fas fa-eraser cursor-pointer text-red-400"
                                wire:click="destroy({{ $item }})"></i>
                        </div>
                    </header>
                    <div x-show="open">
                        @livewire('instructor.courses-lesson', ['section' => $item], key('courses-lesson' . $item->id))
                    </div>

                @endif
            </div>
        </article>
    @endforeach

    <div class="text-red-100" x-data="{ open: false }">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-200 mr-2"></i>
            Agregar nueva seccion
        </a>
        <article class="card text-black" x-show="open">
            <div class="card-body bg-gray-200 p-3">
                <h1 class="text-xl font-bold">Agregar nueva seccion</h1>
                <div>
                    <input wire:model="name" class="form-input w-full" placeholder="Escriba el nombre de la seccion">
                    @error('name')
                        <span class="text-xs text-red-700">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button class="btn btn-danger" x-on:click="open = false">Cancelar</button>
                    <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>
                </div>
            </div>
        </article>
    </div>

</div>
