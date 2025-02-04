<section>
    <h1 class="text-2xl font-bold text-white">Audiencia del curso</h1>
    <hr class="my-6">

    @foreach ($curso->audiences as $item)
        <article class="card py-0 m-2 bg-gray-600 text-white">
            <div class="card-body">

                @if ($audience->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="audience.name" class="form-input w-full text-black">
                    </form>
                    @error('audience.name')
                        <span class="text-xs text-red-700">{{ $message }}</span>
                    @enderror
                @else
                    <header class="flex justify-between">
                        <h1>{{ $item->name }}</h1>
                        <div>
                            <i wire:click="edit({{ $item }})"
                                class="fas fa-edit text-blue-500 cursor-pointer"></i>
                            <i wire:click="destroy({{ $item }})"
                                class="fas fa-trash text-red-500 cursor-pointer ml-2"></i>
                        </div>
                    </header>
                @endif

            </div>
        </article>
    @endforeach

    <article class="card py-0 mt-4 bg-gray-300 ">
        <div class="card-body">
            <form wire:submit.prevent="store">
                <input wire:model="name" class="form-input w-full" placeholder="Agregar la audiencia del curso">
                @error('name')
                    <span class="text-xs text-red-700">{{ $message }}</span>
                @enderror

                <div class="flex justify-end mt-3">
                    <button type="submit" class="btn btn-primary bg-blue-500">Agregar audiencia</button>
                </div>
            </form>
        </div>
    </article>
</section>
