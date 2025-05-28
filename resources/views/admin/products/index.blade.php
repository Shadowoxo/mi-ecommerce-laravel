@extends('layouts.admin')

@section('content')
<h1>Productos</h1>
<a href="{{ route('admin.products.create') }}" class="btn btn-primary">Crear producto</a>

@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th><th>Nombre</th><th>Precio</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>${{ number_format($product->price, 2) }}</td>
            <td>
                <a href="{{ route('admin.products.show', $product) }}" class="btn btn-sm btn-info">Ver</a>
                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $products->links() }}
@endsection
