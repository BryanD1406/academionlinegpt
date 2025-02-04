<div>
    <style>
        .no-select {
        -webkit-touch-callout: none; /* iOS Safari */
        -webkit-user-select: none; /* Safari */
        -khtml-user-select: none; /* Konqueror HTML */
        -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
        user-select: none; /* Non-prefixed version, currently supported by Chrome and Opera */
    }
    </style>
    <article class="card py-0 bg-gray-200 text-black" x-data="{open: false}">
        <div class="card-body py-5">
            <header>
                <h1 x-on:click="open = !open" class="cursor-pointer no-select">Descripcion de la leccion</h1>
                <div x-show="open">
                    <hr class="my-2">
                    @if ($lesson->description)
                        <form wire:submit.prevent="update">
                            <textarea wire:model="description.name" class="form-input w-full"></textarea>
                            @error('description.name')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                            <div class="flex justify-end">
                                <button class="btn btn-danger mr-3 mt-2 text-sm text-black bg-red-300" type="button"
                                    wire:click="destroy">Eliminar</button>
                                <button class="btn btn-primary mr-3 mt-2 text-sm text-black bg-blue-300"
                                    type="submit">Actualizar</button>
                            </div>
                        </form>
                    @else
                        <div wire:submit.prevent="update">
                            <textarea wire:model="name" class="form-input w-full" placeholder="Agregue una descripcion"></textarea>
                            @error('name')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                            <div class="flex justify-end">
                                <button class="btn btn-primary mr-3 mt-2 text-sm text-black bg-blue-300"
                                    wire:click="store">Añadir</button>
                            </div>
                        </div>
                    @endif
                </div>
            </header>
        </div>
    </article>
</div>
