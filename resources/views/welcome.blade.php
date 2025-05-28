<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bienvenido</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <style>
    /* Body y fondo */
    body {
      background-color: #f5f7fa;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      color: #343a40;
    }

    /* Navbar más estilizada */
    .navbar {
      box-shadow: 0 3px 8px rgba(0, 0, 0, 0.12);
      background: #ffffffcc; /* blanco translúcido */
      backdrop-filter: saturate(180%) blur(15px);
      font-weight: 600;
    }

    .navbar-brand {
      font-size: 1.8rem;
      color: #0d6efd;
      letter-spacing: 1.5px;
      transition: color 0.3s;
    }
    .navbar-brand:hover {
      color: #0b5ed7;
      text-decoration: none;
    }

    .nav-link {
      color: #495057;
      font-weight: 500;
      transition: color 0.3s;
    }
    .nav-link:hover,
    .nav-link:focus {
      color: #0d6efd;
    }

    /* Dropdown */
    .dropdown-menu {
      border-radius: 0.35rem;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
      font-size: 0.95rem;
    }

    /* Contenedor principal */
    .container {
      max-width: 1200px;
      padding: 2.5rem 1rem;
    }

    /* Título y texto de bienvenida */
    h1 {
      font-weight: 700;
      color: #212529;
      margin-bottom: 0.5rem;
      letter-spacing: 1.2px;
    }

    .lead {
      font-size: 1.3rem;
      color: #6c757d;
      font-weight: 500;
    }

    /* Cards de productos */
    .card {
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      height: 100%;
      background: #fff;
    }
    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }

    .card-img-top {
      height: 180px;
      object-fit: cover;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
    }

    .no-image-placeholder {
      height: 180px;
      background: #dee2e6;
      color: #6c757d;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 600;
      font-size: 1.1rem;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
      user-select: none;
    }

    .card-body {
      padding: 1.25rem 1.5rem;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .card-title {
      font-weight: 700;
      font-size: 1.2rem;
      margin-bottom: 0.5rem;
      color: #212529;
    }

    .card-text {
      flex-grow: 1;
      font-size: 0.95rem;
      color: #6c757d;
      margin-bottom: 1.25rem;
      line-height: 1.3;
    }

    .price-add {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 1rem;
    }

    .price {
      font-weight: 700;
      font-size: 1.15rem;
      color: #198754;
      user-select: none;
    }

    .btn-primary {
      background-color: #0d6efd;
      border: none;
      padding: 0.4rem 1.1rem;
      font-weight: 600;
      border-radius: 0.375rem;
      box-shadow: 0 3px 8px rgb(13 110 253 / 0.4);
      transition: background-color 0.3s, box-shadow 0.3s;
    }
    .btn-primary:hover,
    .btn-primary:focus {
      background-color: #0b5ed7;
      box-shadow: 0 5px 15px rgb(11 94 215 / 0.6);
    }

    /* Alert info centrada */
    .alert-info {
      font-size: 1.1rem;
      font-weight: 600;
      background-color: #d1ecf1;
      color: #0c5460;
      border-radius: 0.5rem;
      padding: 1rem 1.5rem;
      max-width: 500px;
      margin: 3rem auto;
      box-shadow: 0 2px 10px rgba(12, 84, 96, 0.3);
      text-align: center;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">Mi E-commerce</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center gap-2">
          <li class="nav-item">
            <a
              href="{{ route('productos.index') }}"
              class="nav-link"
              >Ver Productos</a
            >
          </li>
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('cart.index') }}">🛒 Carrito</a>
          </li>
          @if(auth()->user()->role === 'admin')
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="adminMenu"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
              >Admin</a
            >
            <ul
              class="dropdown-menu dropdown-menu-end"
              aria-labelledby="adminMenu"
            >
              <li>
                <a
                  class="dropdown-item"
                  href="{{ route('admin.products.index') }}"
                  >Gestionar Productos</a
                >
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('admin.dashboard') }}"
                  >Dashboard</a
                >
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="userMenu"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
              >{{ auth()->user()->name }}</a
            >
            <ul
              class="dropdown-menu dropdown-menu-end"
              aria-labelledby="userMenu"
            >
              <li>
                <a
                  class="dropdown-item"
                  href="#"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                  >Cerrar sesión</a
                >
                <form
                  id="logout-form"
                  action="{{ route('logout') }}"
                  method="POST"
                  class="d-none"
                >
                  @csrf
                </form>
              </li>
            </ul>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <main class="container">
    <section class="text-center mb-5">
      <h1>Bienvenido a Mi E-commerce</h1>
      <p class="lead">
        Explora nuestros productos y disfruta de tus compras.
      </p>
    </section>

    @if(isset($products) && $products->isEmpty())
    <div class="alert alert-info">
      No hay productos disponibles por el momento.
    </div>
    @elseif(isset($products))
    <section class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      @foreach($products as $product)
      <article class="col">
        <div class="card h-100 shadow-sm">
          @if($product->image_path)
          <img
            src="{{ asset('storage/' . $product->image_path) }}"
            alt="{{ $product->name }}"
            class="card-img-top"
            loading="lazy"
          />
          @else
          <div class="no-image-placeholder">Sin imagen</div>
          @endif
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text text-truncate">{{ Str::limit($product->description, 100) }}</p>
            <div class="price-add mt-auto d-flex justify-content-between align-items-center">
              <span class="price">${{ number_format($product->price, 2) }}</span>
              <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary btn-sm"
                >Agregar</a
              >
            </div>
          </div>
        </div>
      </article>
      @endforeach
    </section>
    @endif
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
