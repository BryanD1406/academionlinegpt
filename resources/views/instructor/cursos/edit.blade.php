<x-instructor-layout :curso="$curso">

  {{-- <x-slot name="curso">
        {{$curso->slug}}
    </x-slot> --}}

  <h1 class="text-xl font-bold text-white">Informacion del curso</h1>
  <hr class="mt-2 mb-6">

  @if (session('error'))
    <div class="w-full py-2 bg-red-800 px-4 my-4">
      <p class="text-lg font-bold text-red-200">{{ session('error') }}</p>
    </div>
  @endif

  {{-- *Formulario --}}
  {{-- ?Activar el envio de archivos --}}

  {!! Form::model($curso, ['route' => ['instructor.cursos.update', $curso], 'method' => 'put', 'files' => true]) !!}

  @include('instructor.cursos.partials.form')

  <div class="flex justify-end">
    {!! Form::submit('Actualizar informacion', ['class' => 'btn bg-green-200 hover:bg-green-800 hover:text-white']) !!}
  </div>
  {!! Form::close() !!}

  {{-- *Slot con nombre --}}
  <x-slot name="js">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    {{-- *asset se pociciona en la carpeta public --}}
    <script src="{{ asset('js/instructor/cursos/form.js') }}"></script>
  </x-slot>
</x-instructor-layout>
