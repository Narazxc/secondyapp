@extends('layouts.layout')


@section('content')

    <!-- Referencing Blade component (sidebar) -->
    <x-sidebar/>
    <!-- This div is to make content stays beside the sidebar -->
    <div class="flex justify-center p-4 sm:ml-64 h-full">
        <div class="px-6 w-full py-6 lg:px-8">
            <div class="shadow-md w-full rounded-md mt-10 p-10">

                <h3 class="mb-4 text-3xl font-bold text-gray-900 dark:text-white">Edit Category</h3>
                <form class="space-y-6" action="{{ route('categories.update', $category) }}" method="post">
                    @csrf
                    @method('patch')
                    <div>
                        <label for="name" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Enter category name/title</label>
                        <input type="text" value="{{ $category->name }}" required name="name" id="name" class=" @error('name') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="">
                    </div>
    
                    @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
    
    
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
    
                </form>
            </div>
        </div>

    </div>


@endsection