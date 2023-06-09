@extends('layouts.layout')


@section('content')
    
    <!-- Referencing Blade component (sidebar) -->
    <x-sidebar/>
    <!-- This div is to make content stays beside the sidebar -->
    <div class="flex justify-center p-4 sm:ml-64 h-full">
    
        <!-- Wrapper for box-shadow -->
        <div class="flex-1 shadow-md rounded-md">
            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" class="m-10">
                @csrf
                @method('patch')
                <h2 class="text-3xl font-bold my-4">Edit product</h2>
                
                <div class="mb-6">
                <label for="title"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product title</label>
                <input type="title" value="{{ $product->title }}" name="title" id="title" class="bg-gray-50 border border-gray-300 @error('title') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Product title" >

                @error('title')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                </div> 

                <div class="mb-6">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                    <textarea id="description" name="description" rows="4" class=" @error('description') border-red-500 @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your details here...">{{ $product->description }}</textarea>


                    @error('description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div> 

                <div class="mb-6">
                    <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags (comma separated)</label>
                    <input type="text" value="{{ $product->tags }}" name="tags" id="tags" class=" @error('tags') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Example: new, brand, shoes">

                    @error('tags')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div> 

                <div class="mb-6">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                    <input type="number" value="{{ $product->price }}" name="price" id="price" class=" @error('price') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Price">

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
                            <!-- This if statement can be omitted -->
                            @if($category->name === $product->category->name)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>

                    @error('category')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Set Product Status</label>
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @if($product->status)
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center pl-3">
                                    <input id="horizontal-list-radio-license"  type="radio" value="1" name="status" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-0  dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 dark:bg-gray-600 dark:border-gray-500" checked>
                                    <label for="horizontal-list-radio-license" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">On Hold</label>
                                </div>
                            </li>
                            <li class="w-full dark:border-gray-600">
                                <div class="flex items-center pl-3">
                                    <input id="horizontal-list-radio-passport"  type="radio" value="0" name="status" class="w-4 h-4 text-gray-400 bg-gray-100 border-gray-300 focus:ring-0 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="horizontal-list-radio-passport" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">None</label>
                                </div>
                            </li>
                        @else
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center pl-3">
                                    <input id="horizontal-list-radio-license"  type="radio" value="1" name="status" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-0  dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="horizontal-list-radio-license" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">On Hold</label>
                                </div>
                            </li>
                            <li class="w-full dark:border-gray-600">
                                <div class="flex items-center pl-3">
                                    <input id="horizontal-list-radio-passport"  type="radio" value="0" name="status" class="w-4 h-4 text-indigo-400 bg-gray-100 border-gray-300 focus:ring-0 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 dark:bg-gray-600 dark:border-gray-500" checked>
                                    <label for="horizontal-list-radio-passport" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">None</label>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div> 

                <div class="relative flex items-center justify-center w-full">
                    <label for="dropzone-file" class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">JPEG, PNG, JPG, GIF or WEBP (MAX. 2MB)</p>
                        </div>
                        <input id="dropzone-file" type="file" class="unhidden @error('images') border-red-500 @enderror absolute top-0 left-0 w-full h-full opacity-1 active:border-transparent focus:ring-transparent focus:outline-none active:ring-0 cursor-pointer" name="images[]" multiple />
                    </label>

                </div>
                @error('images')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror

            @if($product->userContact)
                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                <h2 class="text-3xl font-bold my-4">Seller Information</h2>

                <div class="mb-6">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobile Number</label>
                <input type="number" value="{{ $product->userContact->mobile_number }}" name="mobileNumber" class=" @error('mobileNumber') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mobile Number" value="{{ old('mobileNumber') }}">

                @error('mobileNumber')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                </div> 

                <div class="mb-6">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telegram</label>
                <input type="text" value="{{ $product->userContact->telegram }}"  name="telegram" id="price" class=" @error('telegram') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your Telegram id and/or number" value="{{ old('telegram') }}">

                @error('telegram')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                </div>


                <div class="mb-6">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook</label>
                <input type="text" value="{{ $product->userContact->facebook }}" name="facebook" id="price" class=" @error('facebook') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Paste your Facebook link here" value="{{ old('facebook') }}">

                @error('facebook')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                </div>
            @endif


                <button type="submit" id="image-input" class="text-white mt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>


        <div class="flex-1 mt-6">
            <h2 class="text-3xl ml-6 font-bold my-4">Previous Images</h2>

            <!-- Two columns -->
            <div id="lightgallery" class="flex flex-wrap justify-between pb-10 ml-4 h-32 -mx-2">
                @foreach($product->images as $image)
                
                    <!-- <a href="@if($image === null) https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg  @else {{ asset('images/' . $image->image_path) }} @endif" data-lg-size="1024-800" class="md:w-full lg:w-1/2 mb-4 max-h-60 px-2">
                        <img src="@if($image === null) https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg  @else {{ asset('images/' . $image->image_path) }} @endif" alt="Product Image" class="w-full h-full mb-4 object-cover object-center group-hover:opacity-75">
                    </a> -->

                    <div data-src="@if($image === null) https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg  @else {{ asset('images/' . $image->image_path) }} @endif" class="relative md:w-full lg:w-1/2 mb-4 max-h-60 px-2">
                            <img src="@if($image === null) https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg  @else {{ asset('images/' . $image->image_path) }} @endif" alt="Product Image" class="w-full h-full mb-4 object-cover object-center group-hover:opacity-75">
                    
                         <div class="absolute top-0 right-0 mt-2 mr-2">
                            <form action="{{ route('product.images.destroy', [$product, $image]) }}" method="post">
                                @csrf
                                @method('delete')
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="handleButtonClick(event)">Remove</button>
                            </form>
                        </div>
                    </div>
                    

                    <!-- <div class="relative md:w-full lg:w-1/2 mb-4 max-h-60 px-2">
                    Product Image
                    <img src="@if($image === null) https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg  @else {{ asset('images/' . $image->image_path) }} @endif" alt="Product Image" class="w-full h-full mb-4 object-cover object-center group-hover:opacity-75">

                    Button Container
                    <div class="absolute top-0 right-0 mt-2 mr-2">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="handleButtonClick(event)">Button</button>
                    </div>
                    </div> -->
                    

                    <!-- <div class="item" data-src="img/img1.jpg">
                        <img src="img/thumb1.jpg" />
                    </div> -->
                
                @endforeach
            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/lightgallery.min.js" integrity="sha512-dSI4QnNeaXiNEjX2N8bkb16B7aMu/8SI5/rE6NIa3Hr/HnWUO+EAZpizN2JQJrXuvU7z0HTgpBVk/sfGd0oW+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/fullscreen/lg-fullscreen.min.js" integrity="sha512-wUl8rYJugCiHiMm1uyGDqcgkvwoY9paD9vLJzT3e4mwp46yB0cicFVcvzy8N6UpbtQyFlJDBzrQQ3BNL72w1+A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
    // lightGallery(document.getElementById('lightgallery'), {
    //     plugins: [lgZoom, lgFullscreen],
    //     licenseKey: '0000-0000-000-0000',
    //     speed: 500,
    //     // ... other settings
    // });
    lightGallery(document.getElementById('lightgallery'), {
        animateThumb: false,
        zoomFromOrigin: false,
        allowMediaOverlap: false,
        toggleThumb: false,
    });

    


</script>

<!-- From opening lightGallery -->
<script>
    function handleButtonClick(event) {
    // event.preventDefault();
    event.stopPropagation();

    // Your button click logic here

    // For example, you can display an alert
    // alert("Button clicked");
  }
</script>

@endsection