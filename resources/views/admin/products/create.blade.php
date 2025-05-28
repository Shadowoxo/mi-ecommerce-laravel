@extends('layouts.admin')

@section('content')
<h1>Crear Producto</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3"><label>Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>
    <div class="mb-3"><label>Descripción</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    </div>
    <div class="mb-3"><label>Precio</label>
        <input type="text" name="price" class="form-control" value="{{ old('price') }}">
    </div>
    <div class="mb-3"><label>Imagen</label>
        <input type="file" name="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
@endsection