@extends('layouts.layout')

<style>
   /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>

@section('content')

   <!-- Referencing Blade component (sidebar) -->
   <x-sidebar/>
   <!-- This div is to make content stays beside the sidebar -->
   <div class="flex justify-center p-4 sm:ml-64">

      <!-- Wrapper for box-shadow -->
      <div class="shadow-md w-3/4 rounded-md h-full">
         <form action="/products" method="POST" enctype="multipart/form-data" class="m-10 h-full">
            @csrf
            <h2 class="text-3xl font-bold my-4">Add Product</h2>
            
            <div class="mb-6">
               <label for="title"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product title</label>
               <input type="title" name="title" id="title" class="bg-gray-50 border border-gray-300 @error('title') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Product title" value="{{ old('title') }}">

               @error('title')
                  <div class="text-red-500 mt-2 text-sm">
                     {{ $message }}
                  </div>
               @enderror
            </div> 

            <div class="mb-6">
               <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
               <textarea id="description" name="description" rows="4" class=" @error('description') border-red-500 @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your details here...">{{ old('description') }}</textarea>


               @error('description')
                  <div class="text-red-500 mt-2 text-sm">
                     {{ $message }}
                  </div>
               @enderror
            </div> 

            <div class="mb-6">
               <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags (comma separated)</label>
               <input type="text" name="tags" id="tags" class=" @error('tags') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Example: new, brand, shoes" value="{{ old('tags') }}">

               @error('tags')
                  <div class="text-red-500 mt-2 text-sm">
                     {{ $message }}
                  </div>
               @enderror
            </div> 

            <div class="mb-6">
               <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
               <input type="number" name="price" id="price" class=" @error('price') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Price" value="{{ old('price') }}">

               @error('price')
                  <div class="text-red-500 mt-2 text-sm">
                     {{ $message }}
                  </div>
               @enderror
            </div> 


            <div class="mb-6">
               <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
               <select id="category" name="category" class=" @error('category') border-red-500 @enderror  bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  @foreach($categories as $category)
                     <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                  @endforeach
               </select>

               @error('category')
                  <div class="text-red-500 mt-2 text-sm">
                     {{ $message }}
                  </div>
               @enderror
            </div>

            <div class="relative flex items-center justify-center w-full">
               <label for="dropzone-file" class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                  Upload images (Optional)
               <div class="flex flex-col items-center justify-center pt-5 pb-6">
                  <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                  <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                  <p class="text-xs text-gray-500 dark:text-gray-400">JPEG, PNG, JPG, GIF or WEBP (MAX. 2MB)</p>
               </div>
               <input id="dropzone-file" type="file" class="unhidden @error('images') border-red-500 @enderror absolute top-0 left-0 w-full h-full opacity-1 active:border-transparent focus:ring-transparent focus:outline-none active:ring-0 cursor-pointer" name="images[]" multiple/>
               </label>

            </div>
            @error('images')
               <div class="text-red-500 mt-2 text-sm">
                  {{ $message }}
               </div>
            @enderror

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
            <h2 class="text-3xl font-bold my-4">Seller Information</h2>

            <div class="mb-6">
               <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobile Number</label>
               <input type="number" name="mobileNumber" class=" @error('mobileNumber') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mobile Number" value="{{ old('mobileNumber') }}">

               @error('mobileNumber')
                  <div class="text-red-500 mt-2 text-sm">
                     {{ $message }}
                  </div>
               @enderror
            </div> 

            <div class="mb-6">
               <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telegram</label>
               <input type="text" name="telegram" id="price" class=" @error('telegram') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your Telegram id and/or number" value="{{ old('telegram') }}">

               @error('telegram')
                  <div class="text-red-500 mt-2 text-sm">
                     {{ $message }}
                  </div>
               @enderror
            </div>


            <div class="mb-6">
               <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook</label>
               <input type="text" name="facebook" id="price" class=" @error('facebook') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Paste your Facebook link here" value="{{ old('facebook') }}">

               @error('facebook')
                  <div class="text-red-500 mt-2 text-sm">
                     {{ $message }}
                  </div>
               @enderror
            </div>
            
            <button type="submit" id="image-input" class="text-white mt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
         </form>

      </div>
   </div>


@endsection