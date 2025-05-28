@extends('layouts.admin')

@section('content')
<h1>Detalle de Producto</h1>

<p><strong>ID:</strong> {{ $product->id }}</p>
<p><strong>Nombre:</strong> {{ $product->name }}</p>
<p><strong>Descripción:</strong> {{ $product->description }}</p>
<p><strong>Precio:</strong> ${{ number_format($product->price, 2) }}</p>
@if($product->image_path)
    <p><strong>Imagen:</strong></p>
    <img src="{{ asset('storage/'.$product->image_path) }}" width="200">
@endif

<a href="{{ route('admin.products.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
@endsection
