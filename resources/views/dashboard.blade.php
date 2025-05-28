<!-- resources/views/dashboard.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <!-- Enlace a la lista de productos -->
            <div class="mt-4">
                <a href="{{ route('productos.index') }}" class="text-blue-600 hover:text-blue-900">
                    {{ __('Ver Productos') }}
                </a>
            </div>

            <!-- Enlace a panel de administración si es admin -->
            @if(auth()->user()->role === 'admin')
                <div class="mt-6">
                    <a href="{{ route('admin.dashboard') }}" class="text-indigo-600 hover:text-indigo-900">
                        {{ __('Ir al Panel de Administración') }}
                    </a>
                </div>
            @endif

            <!-- Enlace al carrito para todos los usuarios -->
            <div class="mt-4">
                <a href="{{ route('cart.index') }}" class="text-green-600 hover:text-green-900">
                    {{ __('Ver mi Carrito') }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
