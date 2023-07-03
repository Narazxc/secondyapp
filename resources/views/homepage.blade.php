@extends('layouts.homepage-layout')

@section('content')

    <main>
        <!-- Carousel section -->
        <section>
            <div id="indicators-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative hidden h-96 overflow-hidden rounded-lg md:h-96 md:block">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                    <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_1280.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://images.pexels.com/photos/268533/pexels-photo-268533.jpeg?cs=srgb&dl=pexels-pixabay-268533.jpg&fm=jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://wallpaperaccess.com/full/8750970.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://sportshub.cbsistatic.com/i/2022/10/18/3698c58f-ebce-4b0c-8c0e-09b15857305d/tokyo-revengers.jpg?width=1200" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://www.slashfilm.com/img/gallery/one-punch-man-season-3-is-it-ever-going-to-happen/intro-1644514968.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
        </section>

        @auth
                @if($user->preference)

                    @if($recommendedProducts)
                    <!-- Recommended Products -->
                    <section>
                        <div class="bg-white">
                        <div class="mx-auto max-w-2xl px-4 py-12 sm:px-6 sm:py-16 md:py-16 lg:max-w-7xl lg:px-8 xl:py-16">
                        <h2 class="text-3xl mb-10 font-bold tracking-tight text-gray-900">Recommended Products</h2>

                        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                        
                        
                
                                
                        <!-- More products... -->
                        @foreach ($recommendedProducts as $product)
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

                    </section>
                    @endif

                    <!-- 1st product section -->
                    <section>
                        <div class="bg-white">
                        <div class="mx-auto max-w-2xl px-4 py-12 sm:px-6 sm:py-16 md:py-16 lg:max-w-7xl lg:px-8 xl:py-16">
                        <div class="flex justify-between">
                            <h2 class="text-3xl mb-10 font-bold tracking-tight text-gray-900">{{$categorySections[0]['name']}}</h2>

                            <form action="{{ route('homepage.categories', $categorySections[0]['name']) }}" method="get">

                                <button type="submit" class="hover:underline text-md text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">View more</button>
                            </form>
                        </div>

                        
                        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                        
                        
                
                                
                        <!-- More products... -->
                        @foreach ($categorySections[0]['products'] as $product)
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

                    </section>

                    <!-- 2nd product section -->
                    <section>
                        <div class="bg-white">
                        <div class="mx-auto max-w-2xl px-4 py-12 sm:px-6 sm:py-16 md:py-16 lg:max-w-7xl lg:px-8 xl:py-16">
                        <div class="flex justify-between">
                        <h2 class="text-3xl mb-10 font-bold tracking-tight text-gray-900">{{$categorySections[1]['name']}}</h2>

                            <form action="{{ route('homepage.categories', $categorySections[1]['name']) }}" method="get">
                                <button type="submit" class="hover:underline text-md text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">View more</button>
                            </form>
                        </div>

                        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                        
                        
                
                                
                        <!-- More products... -->
                        @foreach ($categorySections[1]['products'] as $product)
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
                    </section>

                    <!-- 3rd product section -->
                    <section>
                        <div class="bg-white">
                        <div class="mx-auto max-w-2xl px-4 py-12 sm:px-6 sm:py-16 md:py-16 lg:max-w-7xl lg:px-8 xl:py-16">
                        <div class="flex justify-between">
                            <h2 class="text-3xl mb-10 font-bold tracking-tight text-gray-900">{{$categorySections[2]['name']}}</h2>

                            <form action="{{ route('homepage.categories', $categorySections[2]['name']) }}" method="get">
                                <button type="submit" class="hover:underline text-md text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">View more</button>
                            </form>
                        </div>

                        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                        
                        
                
                                
                        <!-- More products... -->
                        @foreach ($categorySections[2]['products'] as $product)
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
                    </section>
                    

                    <section>
                        <div class="bg-white">
                        <div class="mx-auto max-w-2xl px-4 py-12 sm:px-6 sm:py-16 md:py-16 lg:max-w-7xl lg:px-8 xl:py-16">
                        <h2 class="text-3xl mb-10 font-bold tracking-tight text-gray-900">Recently added product</h2>

                        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                        <!-- <a href="#" class="group">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                            </div>
                            <h3 class="mt-4 text-sm text-gray-700">Earthen Bottle</h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">$48</p>
                        </a>
                        <a href="#" class="group">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg" alt="Olive drab green insulated bottle with flared screw lid and flat top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                            </div>
                            <h3 class="mt-4 text-sm text-gray-700">Nomad Tumbler</h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">$35</p>
                        </a>
                        <a href="#" class="group">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-03.jpg" alt="Person using a pen to cross a task off a productivity paper card." class="h-full w-full object-cover object-center group-hover:opacity-75">
                            </div>
                            <h3 class="mt-4 text-sm text-gray-700">Focus Paper Refill</h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">$89</p>
                        </a>
                        <a href="#" class="group">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-04.jpg" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                            </div>
                            <h3 class="mt-4 text-sm text-gray-700">Machined Mechanical Pencil</h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">$35</p>
                        </a> -->
                        
                
                                
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
                    </section>
                    <div class="w-full my-10 flex justify-center">
                        <a href="{{ route('homepage.products') }}" class="text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-400 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-900">Show all products</a>
                    </div>
                @else

                    <section>
                        <div class="bg-white">
                        <div class="mx-auto max-w-2xl px-4 py-12 sm:px-6 sm:py-16 md:py-16 lg:max-w-7xl lg:px-8 xl:py-16">
                        <h2 class="text-3xl mb-10 font-bold tracking-tight text-gray-900">Recently added product</h2>

                        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                        <!-- <a href="#" class="group">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                            </div>
                            <h3 class="mt-4 text-sm text-gray-700">Earthen Bottle</h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">$48</p>
                        </a>
                        <a href="#" class="group">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg" alt="Olive drab green insulated bottle with flared screw lid and flat top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                            </div>
                            <h3 class="mt-4 text-sm text-gray-700">Nomad Tumbler</h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">$35</p>
                        </a>
                        <a href="#" class="group">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-03.jpg" alt="Person using a pen to cross a task off a productivity paper card." class="h-full w-full object-cover object-center group-hover:opacity-75">
                            </div>
                            <h3 class="mt-4 text-sm text-gray-700">Focus Paper Refill</h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">$89</p>
                        </a>
                        <a href="#" class="group">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-04.jpg" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                            </div>
                            <h3 class="mt-4 text-sm text-gray-700">Machined Mechanical Pencil</h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">$35</p>
                        </a> -->
                        
                
                                
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
                    </section>
                    <div class="w-full flex justify-center">
                         <!-- <form action="{{ route('homepage.products') }}" method="get">
                            <button type="submit" class="text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-400 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-900">Show all products</button>
                        </form> -->

                        <a href="{{ route('homepage.products') }}" class="text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-400 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-900">Show all products</a>
                        
                    </div>
                @endif
            @endauth


            @guest
                <section>
                    <div class="bg-white">
                    <div class="mx-auto max-w-2xl px-4 py-12 sm:px-6 sm:py-16 md:py-16 lg:max-w-7xl lg:px-8 xl:py-16">
                    <h2 class="text-3xl mb-10 font-bold tracking-tight text-gray-900">Recently added product</h2>

                    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                    <a href="#" class="group">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">Earthen Bottle</h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">$48</p>
                    </a>
                    <a href="#" class="group">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg" alt="Olive drab green insulated bottle with flared screw lid and flat top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">Nomad Tumbler</h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">$35</p>
                    </a>
                    <a href="#" class="group">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-03.jpg" alt="Person using a pen to cross a task off a productivity paper card." class="h-full w-full object-cover object-center group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">Focus Paper Refill</h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">$89</p>
                    </a>
                    <a href="#" class="group">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-04.jpg" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="h-full w-full object-cover object-center group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">Machined Mechanical Pencil</h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">$35</p>
                    </a>
                    
            
                            
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
                </section>
                <div class="w-full my-10 flex justify-center">
                        <a href="{{ route('homepage.products') }}" class="text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-400 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-900">Show all products</a>
                </div>
            @endguest
        
    </main>

@endsection



        

