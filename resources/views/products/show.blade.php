@extends('layouts.homepage-layout')

@section('content')

    <div class="container flex-col py-24 h-3/4 flex md:flex-row lg:flex-row xl:flex-row justify-center mx-auto">
        <div class="flex-1">
            <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                <img src="@if($product->images->first() === null) https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg  @else {{ asset('images/' . $product->images->first()->image_path) }} @endif" alt="Product Image" class="h-full w-full object-cover object-center group-hover:opacity-75">
            </div>

        </div>

        <div class="flex-1">
            <div class="md:ml-auto ml-0">
                Hello
            </div>
        </div>
    </div>

@endsection