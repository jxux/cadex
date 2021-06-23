<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoria']) !!}
    @error('name')
        <span class="text-red">{{$message}}</span>
    @enderror

    <h2 class="h3">Listado de permisos</h2>
    @foreach ($permissions as $permission)
        <div>
            <label class="mr-2">
                {!! Form::checkbox('permissions[]', $permission->id, null) !!}
                {{ $permission->description }}
            </label>
        </div>
    @endforeach
</div>