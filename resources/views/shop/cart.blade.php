<h1 class="mb-5 text-center fw-bold">🛒 Carrito de Compras</h1>

@if(count($cart) > 0)
    @php $total = 0; @endphp
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $item)
                    @php
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                @if(isset($item['image']) && $item['image'])
                                    <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <div class="bg-secondary text-white d-flex justify-content-center align-items-center rounded me-3" style="width: 60px; height: 60px;">
                                        Sin imagen
                                    </div>
                                @endif
                                <span class="fw-semibold">{{ $item['name'] }}</span>
                            </div>
                        </td>
                        <td class="fw-semibold">${{ number_format($item['price'], 2) }}</td>
                        <td>
                            <span class="badge bg-primary fs-6 px-3 py-2">{{ $item['quantity'] }}</span>
                        </td>
                        <td class="fw-bold text-success">${{ number_format($subtotal, 2) }}</td>
                        <td class="text-center">
                            <a href="{{ route('shop.removeFromCart', $id) }}" class="btn btn-sm btn-outline-danger" title="Quitar producto" aria-label="Quitar {{ $item['name'] }}">
                                <i class="bi bi-trash"></i> Quitar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="table-light">
                    <th colspan="3" class="text-end fs-5">Total:</th>
                    <th colspan="2" class="text-success fs-4 fw-bold">${{ number_format($total, 2) }}</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-3">
        <a href="{{ route('shop.index') }}" class="btn btn-outline-secondary btn-lg">
            ← Seguir comprando
        </a>
        <form method="POST" action="{{ route('shop.checkout') }}">
            @csrf
            <button type="submit" class="btn btn-success btn-lg px-4">
                Finalizar compra <i class="bi bi-credit-card-2-front"></i>
            </button>
        </form>
    </div>

@else
    <div class="alert alert-info text-center fs-5 py-4 shadow-sm">
        Tu carrito está vacío.
    </div>
    <div class="text-center mt-3">
        <a href="{{ route('shop.index') }}" class="btn btn-primary btn-lg px-4">
            ← Volver a la tienda
        </a>
    </div>
@endif

<!-- Recuerda incluir Bootstrap Icons para los íconos -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
