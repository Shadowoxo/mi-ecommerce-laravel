@extends('layouts.admin')

@section('content')
<h1>Editar Producto</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="mb-3"><label>Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
    </div>
    <div class="mb-3"><label>Descripción</label>
        <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
    </div>
    <div class="mb-3"><label>Precio</label>
        <input type="text" name="price" class="form-control" value="{{ old('price', $product->price) }}">
    </div>
    <div class="mb-3"><label>Imagen</label>
        <input type="file" name="image" class="form-control">
        @if($product->image_path)
            <img src="{{ asset('storage/'.$product->image_path) }}" width="100" class="mt-2">
        @endif
    </div>
    <button type="submit" class="btn btn-success">Actualizar</button>
</form>
@endsection