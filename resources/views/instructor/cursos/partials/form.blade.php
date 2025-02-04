{{-- *TITLE --}}

<div class="mb-4">
    {!! Form::label('title', 'titulo del curso', ['class' => 'text-white']) !!}
    {!! Form::text('title', null, [
        'class' =>
            'form-input block w-full mt-5 text-black mt-2' . ($errors->has('title') ? ' border-red-700 border-4' : ''),
    ]) !!}
    @error('title')
        <strong class="text-xs text-red-200 mb-6">{{ $message }}</strong>
    @enderror
</div>


{{-- *SLUG --}}

<div class="mb-4">
    {!! Form::label('slug', 'Slug del curso', ['class' => 'text-white']) !!}
    {!! Form::text('slug', null, [
        'readonly' => 'readonly',
        'class' =>
            'form-input block w-full mt-5 text-black mt-2' . ($errors->has('slug') ? ' border-red-700 border-4' : ''),
    ]) !!}
    @error('slug')
        <strong class="text-xs text-red-200 mb-6">{{ $message }}</strong>
    @enderror
</div>



{{-- *Subtitulo --}}
<div class="mb-4">
    {!! Form::label('subtitle', 'Subtitulo del curso', ['class' => 'text-white']) !!}
    {!! Form::text('subtitle', null, [
        'class' =>
            'form-input block w-full mt-5 text-black mt-2' . ($errors->has('subtitle') ? ' border-red-700 border-4' : ''),
    ]) !!}
    @error('subtitle')
        <strong class="text-xs text-red-200 mb-6">{{ $message }}</strong>
    @enderror
</div>

{{-- *Desripction --}}
<div class="mb-4 text-black">
    {!! Form::label('description', 'Descripcion del curso', ['class' => 'text-white']) !!}
    {!! Form::textarea('description', null, [
        'class' =>
            'form-input block w-full mt-5 text-black mt-2' .
            ($errors->has('description') ? ' border-red-700 border-4' : ''),
    ]) !!}
    @error('description')
        <strong class="text-xs text-red-200 mb-6">{{ $message }}</strong>
    @enderror
</div>






<div class="grid grid-cols-3 gap-4">

    {{-- *Categoria --}}
    <div>
        {!! Form::label('category_id', 'Categoria: ', ['class' => 'text-white']) !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-input block w-full mt-1 text-black mt-2 ']) !!}
    </div>

    {{-- *Nivel --}}
    <div>
        {!! Form::label('level_id', 'Niveles: ', ['class' => 'text-white']) !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1 text-black mt-2 ']) !!}
    </div>

    {{-- *Precio --}}

    <div>
        {!! Form::label('price_id', 'Precios: ', ['class' => 'text-white']) !!}
        {!! Form::select('price_id', $prices, null, ['class' => 'form-input block w-full mt-1 text-black mt-2 ']) !!}
    </div>
</div>

{{-- *Imagen --}}

<h1 class="text-2xl font-bold mt-4 mb-4 text-white">Imagen del curso</h1>
<div class="grid grid-cols-2 gap-4">
    <figure>
        {{-- *SI la variable curso existe imprime lo siguiente --}}
        @isset($curso->image)
            <img id="picture" class="w-full h-64 object-cover object-center border-2 border-black shadow-2xl rounded-2xl"
                src="{{ Storage::url($curso->image->url) }}" alt="">
        @else
            <img id="picture" class="w-full h-64 object-cover object-center border-2 border-black shadow-2xl rounded-2xl"
                src="https://cdn.pixabay.com/photo/2017/04/19/13/16/computer-2242264_1280.jpg" alt="">
        @endisset
    </figure>
    <div class="text-white">
        <p>Seleccionar una imagen atractiva es adecuado para llamar la atencion de nueva audiencia</p>
        {!! Form::file('file', ['class' => 'form-input w-full mt-5', 'id' => 'file', 'accept' => 'image/*']) !!}
        {{-- *Convertir imagen a base 64 para que al subir una imagen se cambie --}}
        @error('file')
            <strong class="text-xs text-red-200 mb-6">{{ $message }}</strong>
        @enderror
    </div>
</div>
