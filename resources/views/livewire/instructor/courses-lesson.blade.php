<div>
    @foreach ($section->lessons as $item)
        <article class="card py-0 mt-3 mb-3 bg-gray-100" x-data="{open: false}">
            <div class="card-body py-2">

                @if ($lesson->id == $item->id)
                    <form wire:submit.prevent="update">
                        <div>
                            <div class="flex items-center">
                                <label class="w-32">Nombre</label>
                                <input class="form-input w-full" wire:model="lesson.name">
                            </div>
                            @error('lesson.name')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center mt-4 mb-4">
                            <label class="w-32">Plataforma: </label>
                            <select wire:model="lesson.platform_id">
                                @foreach ($platforms as $platform)
                                    <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <div class="flex items-center">
                                <label class="w-32">Url</label>
                                <input class="form-input w-full" wire:model="lesson.url">
                            </div>
                            @error('lesson.url')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror

                            <div class="mt-4 flex justify-end">
                                <button type="button" class="btn btn-danger mr-2 bg-red-500"
                                    wire:click="cancel">Cancelar</button>
                                <button type="submit" class="btn btn-primary bg-blue-500">Actualizar</button>
                            </div>
                        </div>
                    </form>
                @else
                    <header>
                        <h1 class="cursor-pointer" x-on:click="open = !open"> <i class="far fa-play-circle text-blue-500 mr-5"></i>Leccion: {{ $item->name }}
                        </h1>
                    </header>
                    <div x-show="open">
                        <hr class="my-2">
                        <p class="text-sm">Plataforma: {{ $item->platform->name }}</p>
                        <p class="text-sm">Enlace: <a href="{{ $item->url }}" target="_blank"
                                class="text-blue-600">{{ $item->url }}</a></p>

                        <div class="mt-2">
                            <button class="btn btn-primary text-sm"
                                wire:click="edit({{ $item }})">Editar</button>
                            <button class="btn btn-danger text-sm"
                                wire:click="destroy({{ $item }})">Eliminar</button>
                        </div>

                        <div>
                            @livewire('instructor.lesson-description', ['lesson' => $item], key('lesson-description' . $item->id))
                        </div>

                        <div>
                            @livewire('instructor.lesson-resources', ['lesson' => $item], key('lesson-resources' . $item->id))
                        </div>
                    </div>
                @endif


            </div>
        </article>
    @endforeach

    <div class="text-red-100 mt-4" x-data="{ open: false }">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer text-black">
            <i class="far fa-plus-square text-2xl text-red-700 mr-2"></i>
            Agregar nueva leccion
        </a>
        <article class="card text-black" x-show="open">
            <div class="card-body bg-gray-200 p-3">
                <h1 class="text-xl font-bold">Agregar nueva leccion</h1>
                <div>
                    <div class="flex items-center">
                        <label class="w-32">Nombre</label>
                        <input class="form-input w-full" wire:model="name">
                    </div>
                    @error('name')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center mt-4 mb-4">
                    <label class="w-32">Plataforma: </label>
                    <select wire:model="platform_id">
                        @foreach ($platforms as $platform)
                            <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('platform_id')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror

                <div>
                    <div class="flex items-center">
                        <label class="w-32">Url</label>
                        <input class="form-input w-full" wire:model="url">
                    </div>
                    @error('url')
                        <span class="text-xs text-red-500">{{ $message }}</span>
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
