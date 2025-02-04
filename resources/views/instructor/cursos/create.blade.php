<x-app-layout>
    <div class="container py-8 bg-orange-800">
        <div class="card bg-green-800">
            <div class="card-body py-2 text-xl font-bold text-gray-200">
                <h1>Crear nuevo curso</h1>
                <hr class="mt-2 mb-6">

                {{-- *Formulario --}}

                {!! Form::open(['route' => 'instructor.cursos.store', 'files' => true, 'autocomplete' => 'off']) !!}

                {!! Form::hidden('user_id', auth()->user()->id) !!}
                @include('instructor.cursos.partials.form')

                <div class="flex justify-end">
                    {!! Form::submit('Crear nuevo curso', [
                        'class' => 'btn btn-primary cursor-pointer bg-green-600 hover:bg-green-900',
                    ]) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{-- *Slot con nombre --}}
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
        {{-- *asset se pociciona en la carpeta public --}}
        <script src="{{ asset('js/instructor/cursos/form.js') }}"></script>
    </x-slot>
</x-app-layout>
