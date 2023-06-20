@extends('layouts.homepage-layout')


@section('content')

<main class="h-screen">
    <section>
        <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-12 sm:px-6 sm:py-16 md:py-16 lg:max-w-7xl lg:px-8 xl:py-16">
        <h2 class="text-3xl mb-10 font-bold tracking-tight text-gray-900">Search result for: {{ $tag }}</h2>

        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

                
        <!-- More products... -->
        @foreach($products as $product)
        <a href="{{ route('products.show', $product) }}" class="group">
            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
            <img src="@if($product->images->first() === null) https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg  @else {{ asset('images/' . $product->images->first()->image_path) }} @endif" alt="Product Image" class="h-full w-full object-cover object-center group-hover:opacity-75">
            </div>
            <h3 class="mt-4 text-sm text-gray-700">{{ $product['title'] }}</h3>
            <div class="my-2">
                @php
                    $tags = explode(',', $product->tags);
                @endphp

                @foreach($tags as $tag)
                <span class="bg-pink-100 cursor-pointer text-pink-800 text-xs font-medium mr-1 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300">{{ $tag }}</span>
                @endforeach
            </div>
            
            <p class="mt-1 text-lg font-medium text-gray-900">${{ $product['price'] }}</p>
        </a>
        @endforeach

    </section>

</div>



@endsection