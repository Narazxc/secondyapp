@extends('layouts.layout')


@section('content')

   <!-- Referencing Blade component (sidebar) -->
   <x-sidebar/>
   <!-- This div is to make content stays beside the sidebar -->
   <div class="flex justify-center sm:ml-64 h-full">

      <x-app-layout>
         <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                  {{ __('Dashboard') }}
            </h2>
         </x-slot>

         <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                     <div class="p-6 text-gray-900 dark:text-gray-100">
                        <!-- {{ __("You're logged in!") }} -->
                        <!-- {{ __("Welcome" . " " . auth()->user()->name . "!") }} -->
                        {{ __("You're now logged in" . " " . auth()->user()->name . "!") }}
                     </div>
                  </div>
            </div>
         </div>

      </x-app-layout>

   </div>
@endsection
   
   
<!-- <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
  <span class="sr-only">Open sidebar</span>
  <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
     <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
  </svg>
</button> -->

<!-- <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
  <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
     <ul class="space-y-2 font-medium">
        <li>
           <a href="/dashboard" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-300
            dark:hover:bg-gray-900">
              <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
              <span class="ml-3">Dashboard</span>
           </a>
        </li>


        <li>
           <a href="{{ route('products.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-300 dark:hover:bg-gray-900">
              <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
              <span class="flex-1 ml-3 whitespace-nowrap">Your Product</span>
           </a>
        </li>
       <li>
           <a href="/products/create" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-300 dark:hover:bg-gray-900">
              <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
              <span class="flex-1 ml-3 whitespace-nowrap">Add Product</span>
           </a>
        </li>

       <li>
           <a href="/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-300 dark:hover:bg-gray-900">
              <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
              <span class="flex-1 ml-3 whitespace-nowrap">Back to shop</span>
           </a>
        </li>
       <li>
           <a href="{{ route('categories') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-300 dark:hover:bg-gray-900">
              <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
              <span class="flex-1 ml-3 whitespace-nowrap">Manage Category</span>
           </a>
        </li>

     </ul>
  </div>
</aside> -->