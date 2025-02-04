<x-instructor-layout :curso="$curso">
    <h1 class="text-2xl font-bold text-white">OBSERVACIONES</h1>
    <hr class="mt-2 mb-6">
    <div class="card py-3 bg-slate-300">
        <div class="card-body py-0">
            {!!$curso->observation->body!!}
        </div>
    </div>
</x-instructor-layout>
