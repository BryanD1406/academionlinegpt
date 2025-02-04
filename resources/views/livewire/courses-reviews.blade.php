<section class="mt-5">
    @if ($curso->reviews)
        <h1 class="font-bold text-3xl">Valoracion</h1>

        @can('enrolled', $curso)
            @can('valued', $curso)
                <article class="bg-gray-500 p-4 pt-0 mt-2 rounded">

                    <textarea wire:model="comment" class="form-input w-full mt-5 text-black" rows="3"
                        placeholder="Registre una nueva reseña para el curso"></textarea>
                    <div class="flex items-center mt-3">
                        <button class="btn btn-primary" wire:click="store">Registrar reseña</button>
                        <ul class="flex ml-5">
                            <li class="mr-1 cursor-pointer" wire:click="$set('rating', 1)"><i
                                    class="fas fa-star text-{{ $rating >= 1 ? 'white' : 'black' }}"></i>
                            </li>
                            <li class="mr-1 cursor-pointer" wire:click="$set('rating', 2)"><i
                                    class="fas fa-star text-{{ $rating >= 2 ? 'white' : 'black' }}"></i>
                            </li>
                            <li class="mr-1 cursor-pointer" wire:click="$set('rating', 3)"><i
                                    class="fas fa-star text-{{ $rating >= 3 ? 'white' : 'black' }}"></i>
                            </li>
                            <li class="mr-1 cursor-pointer" wire:click="$set('rating', 4)"><i
                                    class="fas fa-star text-{{ $rating >= 4 ? 'white' : 'black' }}"></i>
                            </li>
                            <li class="mr-1 cursor-pointer" wire:click="$set('rating', 5)"><i
                                    class="fas fa-star text-{{ $rating == 5 ? 'white' : 'black' }}"></i>
                            </li>
                        </ul>
                    </div>

                </article>

            @else
            <div class="bg-indigo-900 text-center py-4 lg:px-4 mt-5">
                <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                  <span class="font-semibold mr-2 text-left flex-auto">Usted ya registro una reseña para este curso</span>
                </div>
              </div>
            @endcan
        @endcan
        <div class="card py-5 mt-5">
            <div class="card-body py-0">

                <p class="text-white-200 text-xl font-bold">{{ $curso->reviews->count() }} valoraciones</p>
                @foreach ($curso->reviews as $review)
                    <article class="flex mb-4 text-gray-500 items-center font-bold mt-5">
                        <figure>
                            <img class="h-12 w-12 object-cover rounded-full shadow"
                                src="{{ $review->user->profile_photo_url }}" alt="">
                        </figure>
                        <div class="card p-3 flex-1 ml-5">
                            <div class="card-body px-5 py-4 $review bg-gray-100">
                                <p><b>{{ $review->user->name }}</b><i
                                        class="fas fa-star text-yellow-300 mb-2section"></i>({{ $review->rating }})</p>
                                {{ $review->comment }}
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    @endif
</section>
