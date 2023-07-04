@extends('layouts.layout')


@section('content')

    <!-- Referencing Blade component (sidebar) -->
    <x-sidebar/>
    <!-- This div is to make content stays beside the sidebar -->
    <div class="flex justify-center p-4 sm:ml-64 h-full">

        <!-- Card -->
        <div class="shadow-md w-full rounded-md mt-5">
            <!-- Content -->
            <div class="relative overflow-hidden shadow-md sm:rounded-lg ">
                <h2 class="ml-4 text-3xl font-bold my-4">Your Favorite Products</h2>
                <div class="flex items-center justify-between p-4">
                    <!-- Right Side -->
                    <form action="{{ route('favorites.index') }}" method="GET" class="hidden lg:block lg:pl-2">
                        <label for="topbar-search" class="sr-only">Search</label>
                        <div class="relative mt-1 lg:w-96">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input type="text" name="tableSearch" id="topbar-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search">
                        </div>
                    </form>
                    <!-- <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
                    </div> -->

          
                </div>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 overflow-hidden">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Image</span>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Product
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Added date
                            </th>
                            <th scope="col" class="px-6 py-3 flex justify-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($favorites->count() == 0)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-32 p-4">
                                    Go like something :)
                                </td>
                            </tr>
                        @else
                            @foreach($favorites as $favorite)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="w-32 p-4">
                                        <img src="@if($favorite->product->images->first() === null) https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg  @else {{ asset('images/' . $favorite->product->images->first()->image_path) }} @endif" alt="{{ $favorite->product->description }}">
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                        {{ $favorite->product->title }}
                                    </td>

                                    <td class="px-6 py-4  dark:text-white">
                                        {{ $favorite->created_at->diffForHumans() }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="h-full flex justify-evenly">
                                            <a href="{{ route('products.show', $favorite->product)  }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View Product</a>
                                            <form action="{{ route('favorites.destroy', $favorite->product) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove from favorite</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            
                        @endif
                        
                    </tbody>
                </table>
            </div>

            <div class="w-full px-5 rounded-md mt-6 pb-5">
                {{ $favorites->links() }}
            </div>
        </div>

    </div>


@endsection


