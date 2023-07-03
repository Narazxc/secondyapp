@extends('layouts.homepage-layout')

@section('content')

<section>
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-12 sm:px-6 sm:py-16 md:py-16 lg:max-w-7xl lg:px-8 xl:py-16">
            <h2 class="text-3xl mb-10 font-bold tracking-tight text-gray-900">Category: {{ $category->name }}</h2>

            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
 
            
                <!-- More products... -->
                @foreach($products as $product)
                    <div class="relative">
                        <!-- Badge Component -->
                        @if($product->status)
                            <span class="inline-flex opacity-95 items-center badge z-10 bg-yellow-50 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20 absolute top-0 right-0 mt-2 mr-2 px-2.5 py-1 rounded-full dark:bg-indigo-900 dark:text-indigo-300"> <svg aria-hidden="true" class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>On hold</span>    
                        @endif
                        <a href="{{ route('products.show', $product) }}" class="group">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                <!-- <img src="@if($product->images->first() === null) https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg  @else {{ asset('images/' . $product->images->first()->image_path) }} @endif" alt="Product Image" class="h-full w-full object-fit object-center group-hover:opacity-75"> -->

                                <img src="@if($product->images->first() === null) https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg  @else {{ asset('images/' . $product->images->first()->image_path) }} @endif" alt="Product Image" class="h-96 w-full object-fit object-cover object-center group-hover:opacity-75">
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
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</section>

@endsection