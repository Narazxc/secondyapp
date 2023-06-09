@extends('layouts.layout')

@section('content')

   <!-- Referencing Blade component (sidebar) -->
   <x-sidebar/>
   <!-- This div is to make content stays beside the sidebar -->
   <div class="flex justify-center p-4 sm:ml-64 h-full">

      <!-- Wrapper for box-shadow -->
      <div class="shadow-md w-3/4 rounded-md">
         <form action="/products" method="POST" enctype="multipart/form-data" class="m-10">
            @csrf
            <h2 class="text-3xl font-bold my-4">Add product</h2>
            

            <div class="mb-6">
               <label for="title"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product title</label>
               <input type="title" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Product title" required>
            </div> 

            <div class="mb-6">
               <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
               <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your details here..."></textarea>
            </div> 

            <div class="mb-6">
               <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
               <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Price" required>
            </div> 
            <div class="mb-6">
               <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
               <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  @foreach($categories as $category)
                     <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
               </select>
            </div>

            <div class="flex items-center justify-center w-full">
               <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
               <div class="flex flex-col items-center justify-center pt-5 pb-6">
                     <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                     <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                     <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
               </div>
               <input id="dropzone-file" type="file" class="hidden" multiple name="images[]" />
               </label>
            </div> 

            <button type="submit" class="text-white mt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
         </form>

      </div>
   </div>

@endsection