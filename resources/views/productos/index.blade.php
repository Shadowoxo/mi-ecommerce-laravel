@extends('layouts.app')

@section('title', 'Productos')

@section('header')
    <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Lista de Productos') }}
    </h2>
@endsection

@section('content')
    <div class="py-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Mensaje si no hay productos --}}
        @if($products->isEmpty())
            <div class="text-center text-gray-600 dark:text-gray-400">
                <p class="text-lg font-medium">No hay productos disponibles por el momento.</p>
            </div>
        @else
            {{-- Productos disponibles --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                @foreach($products as $product)
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden group">
                        
                        {{-- Imagen --}}
                        @if($product->image_path)
                            <img src="{{ asset('storage/' . $product->image_path) }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-500 dark:text-gray-300">
                                Sin imagen
                            </div>
                        @endif

                        {{-- Detalles --}}
                        <div class="p-4 flex flex-col justify-between h-full">
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white truncate">
                                {{ $product->name }}
                            </h3>

                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1 line-clamp-2">
                                {{ $product->description }}
                            </p>

                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-green-600 dark:text-green-400 font-semibold text-base">
                                    ${{ number_format($product->price, 2) }}
                                </span>

                                <a href="{{ route('cart.add', $product->id) }}"
                                   class="inline-flex items-center gap-1 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-3 py-1.5 rounded-lg transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M3 3h2l.4 2M7 13h14l1-5H6.4M7 13l-1.5 7h13m-11.5-7L5.4 5H21" />
                                    </svg>
                                    Agregar
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @endif

    </div>
@endsection
