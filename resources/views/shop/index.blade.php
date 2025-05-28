<h1 style="font-family: Arial, sans-serif; text-align: center;">🛍️ Productos</h1>

<div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
    @foreach($products as $product)
        <div style="border: 1px solid #ddd; border-radius: 10px; padding: 15px; width: 200px; box-shadow: 2px 2px 8px rgba(0,0,0,0.1); font-family: Arial, sans-serif; text-align: center;">
            <strong style="font-size: 18px;">{{ $product->name }}</strong><br>
            <span style="color: #28a745; font-weight: bold;">${{ $product->price }}</span><br>
            <a href="{{ route('shop.addToCart', $product->id) }}" style="display: inline-block; margin-top: 10px; padding: 8px 12px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;">Agregar al carrito</a>
        </div>
    @endforeach
</div>

<div style="text-align: center; margin-top: 30px;">
    <a href="{{ route('shop.cart') }}" style="padding: 10px 20px; background-color: #ffc107; color: black; text-decoration: none; border-radius: 5px; font-weight: bold;">🛒 Ver carrito</a>
</div>
