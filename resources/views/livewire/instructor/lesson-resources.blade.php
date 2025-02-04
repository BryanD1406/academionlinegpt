<div class="card py-2 bg-gray-200 mt-5" x-data="{open: false}">
    <div class="card-body  py-2">
        <header>
            <h1 class="cursor-pointer" x-on:click="open = !open">Recursos de la leccion</h1>
        </header>
        <div x-show="open">
            <hr class="my-2">
            @if ($lesson->resource)
                <div class="flex justify-between items-center">
                    <p><i wire:click="download" class="fas fa-download text-black mr-2 cursor-pointer"></i>{{$lesson->resource->url}}</p>
                    <i wire:click="destroy" class="fas fa-trash text-red-500 cursor-pointer"></i>
                </div>
            @else
                <form wire:submit.prevent="save">
                    <div class="flex items-center">
                        <input wire:model="file" type="file" class="form-input flex-1">
                        <button type="submit" class="btn btn-primary text-sm ml-3 bg-blue-500 ">Guardar</button>
                    </div>

                    <div class="text-blue-500 font-bold mt-1" wire:loading wire:target="file">
                        Cargando...
                    </div>

                    @error('file')
                        <span class="text-xs text-red-700">{{ $message }}</span>
                    @enderror
                </form>
            @endif
        </div>
    </div>
</div>
