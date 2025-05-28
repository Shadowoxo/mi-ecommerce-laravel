<h2>Tu carrito</h2>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

@forelse($cart as $id => $item)
    <p>{{ $item['name'] }} - ${{ $item['price'] }} x {{ $item['quantity'] }}
        <a href="{{ route('cart.remove', $id) }}">Eliminar</a>
    </p>
@empty
    <p>Tu carrito está vacío.</p>
@endforelse

<a href="{{ route('cart.clear') }}">Vaciar carrito</a>
