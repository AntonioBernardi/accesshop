@extends('layout')

@section('content')

    <!-- EL MAIN -->
    <main class="bg-white border border-gray-200 rounded-lg shadow-md m-6 flex flex-col items-center max-w-[1400px] mx-auto">
        <p class="text-4xl py-2 px-4">{{ $product -> name }}</p>
        <div class="flex flex-col md:grid md:grid-cols-3">
            <div class="mx-auto">
                <p class="py-2 px-4">
                    <img src="{{ $product->image }}" alt="Sin foto" class="w-[300px] h-[300px]">
                </p>
            </div>
            <div class="col-span-2 text-center md:text-left">
                <div>
                    <p class="text-3xl py-2 px-4 flex align-items-start">Categoría: {{$product -> category}}</p>
                </div>
                <div>
                    <p class="text-3xl py-2 px-4 flex align-items-start">Descripción:</p>
                    <p class="text-2xl py-2 px-4">{{$product -> view_description}}</p>
                </div>
            </div>
        </div>
        <div class="m-4 w-full px-6 flex flex-col items-center">
            <p class="text-3xl m-2">Tiendas disponibles</p>
            <div class="flex gap-2 items-center">
                <p>Ordenar por:</p>
                <form action="{{ route("show.product", $product -> id) }}">
                    <input type="hidden" name="sortBy" value="price">
                    <button class="hidden md:flex bg-yellow-500 text-white hover:bg-yellow-600 px-4 py-2 rounded-md" type="submit">
                        <span>Precio</span>
                    </button>
                </form>
                <form action="{{ route("show.product", $product -> id) }}">
                    <input type="hidden" name="sortBy" value="rating">
                    <button class="hidden md:flex bg-yellow-500 text-white hover:bg-yellow-600 px-4 py-2 rounded-md" type="submit">
                        <span>Valoración</span>
                    </button>
                </form>
            </div>
            @foreach($sorter as $shop)
                <div class="w-full m-12 bg-yellow-100 border border-gray-300 rounded-md">
                    <div class="flex items-center justify-center p-4">
                        <!-- Imagen -->
                        <div class="w-full md:w-1/4 flex justify-center mb-4 md:mb-0">
                            <img src="{{$shop -> image}}" class="w-3/4" alt="{{$shop -> name}}">
                        </div>

                        <!-- Información del producto -->
                        <div class="w-full md:w-1/2 flex flex-col items-center">
                            <p class="text-2xl">{{$shop -> name}}</p>
                            <div class="w-full flex justify-around">
                                <div>
                                    <b>Valoración:</b>
                                    <p class="flex text-yellow-400">
                                        @for($i = 1; $i <= $shop -> pivot -> rating; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.975a1 1 0 00.95.69h4.184c.969 0 1.371 1.24.588 1.81l-3.39 2.463a1 1 0 00-.364 1.118l1.286 3.975c.3.921-.755 1.688-1.54 1.118l-3.39-2.463a1 1 0 00-1.175 0l-3.39 2.463c-.784.57-1.838-.197-1.539-1.118l1.286-3.975a1 1 0 00-.364-1.118L2.04 9.402c-.783-.57-.38-1.81.588-1.81h4.184a1 1 0 00.95-.69l1.287-3.975z" />
                                            </svg>
                                        @endfor
                                    </p>
                                </div>
                                <div>
                                    <b>Precio:</b>
                                    <p>{{$shop -> pivot -> price}}€</p>
                                </div>
                            </div>
                        </div>

                        <!-- Botón para desktop -->
                        <div class="hidden md:flex w-full md:w-1/4 justify-center items-center mt-4 md:mt-0">
                            <a href="{{$shop -> pivot -> product_link}}" class="bg-yellow-500 text-white px-6 py-3 rounded-md hover:bg-yellow-600 transition">
                                    Ir a la página
                            </a>
                        </div>

                        <!-- Botón para móvil -->
                        <div class="flex md:hidden w-full justify-center mt-4">
                            <button type="button" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition">
                                Ir al producto
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
