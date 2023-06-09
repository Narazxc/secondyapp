@extends('layouts.homepage-layout')

@section('content')

    <div class="container flex justify-center md:flex-col mx-auto">
        <div>
            <div class="flex-initial aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                <img src="@if($product->images->first() === null) https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg  @else {{ asset('images/' . $product->images->first()->image_path) }} @endif" alt="Product Image" class="h-2/4 w-2/4 object-cover object-center group-hover:opacity-75">
            </div>

        </div>

        <div class="flex-initial">
            Hello
        </div>
    </div>

@endsection