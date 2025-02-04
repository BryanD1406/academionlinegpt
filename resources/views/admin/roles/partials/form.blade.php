<div class="form-group">
    {{-- *Incluimos label --}}
    {{-- *Colocamos atributos que queremos que tenga el label --}}
    {!! Form::label('name', 'Nombre: ') !!}
    {{-- *Hcaemos recorrido de los errores y en caso de que haya uno colocamos la clase is-invalid caso contrario no pondra otra clases --}}
    {!! Form::text('name', null, [
        'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
        'placeholder' => 'Escriba un nombre',
    ]) !!}
    {{-- *Si ah ocurrido un error en el campo name mostrara ese mensaje 
                    * La clase invalid-feedback debe estar debajo de la clase is invalid caso contrario no mostrara nigun error, solo es por la clase 
                    * Siempre revisar la documentacion --}}

    @error('name')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>

<strong class="">
    Permisos:
</strong>

@foreach ($permissions as $permission)
    <div>
        <label for="">
            {{-- *Indicamos que le pasaremos un array --}}
            {{-- *{!! Form::checkbox($name, $value, $checked, [$options]) !!} --}}

            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
            {{ $permission->name }}
        </label>
    </div>
@endforeach

@error('permissions')
    <small class="text-danger">
        <strong>{{ $message }}</strong>
    </small>
    <br>
@enderror
