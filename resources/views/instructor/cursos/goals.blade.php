<x-instructor-layout :curso="$curso">
    {{-- <x-slot name="curso">
        {{ $curso->slug }}
    </x-slot> --}}

    <div class="my-5 mt-5">
        @livewire('instructor.courses-goals', ['curso' => $curso], key('courses-goals' . $curso->id))
    </div>
    <div class="my-5 mt-5">
        @livewire('instructor.courses-requirements', ['curso' => $curso], key('courses-requirements' . $curso->id))
    </div>
    <div class="my-5 mt-5">
        @livewire('instructor.courses-audiences', ['curso' => $curso], key('courses-audiences' . $curso->id))
    </div>
</x-instructor-layout>
