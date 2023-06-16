@extends('layouts.homepage-layout')

@section('content')

    <!-- <div class="container flex-col py-24 h-3/4 flex md:flex-row lg:flex-row xl:flex-row justify-center mx-auto">
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
    </div> -->



 <!-- <div class="container h-screen mx-auto px-4 py-8 flex justify-center">
    <div class="max-w-4xl h-2/4 w-full md:w-2/3 lg:w-1/2">
      <div class="flex flex-wrap mx-4">
        <div class="w-full md:w-1/2 lg:w-1/3 px-4">
            <img src="@if($product->images->first() === null) https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg  @else {{ asset('images/' . $product->images->first()->image_path) }} @endif" alt="Product Image" class="h-full w-full object-cover object-center group-hover:opacity-75">
        </div>
        <div class="w-full flex flex-col justify-space-between md:w-1/2 lg:w-2/3 px-4 mt-4 md:mt-0">
          <h1 class="text-3xl font-bold mb-2">Product Name</h1>
          <p class="text-gray-600 text-sm mb-4">Product description goes here.</p>
          <div class="flex mb-4">
            <span class="text-lg font-bold text-gray-700 mr-2">$99.99</span>
            <span class="text-sm text-gray-500 line-through">$129.99</span>
          </div>
          <div class="flex items-center mb-4">
            <span class="text-sm text-gray-600 mr-2">Quantity:</span>
            <input type="number" class="w-16 px-2 py-1 border border-gray-300 rounded-lg" value="1">
          </div>
          <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
            Add to Cart
          </button>
        </div>
      </div>
    </div>
  </div> -->

        <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
            <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden">
                <img src="@if($product->images->first() === null) https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg  @else {{ asset('images/' . $product->images->first()->image_path) }} @endif" alt="Product Image" class="h-full w-full object-cover object-center group-hover:opacity-75">
                <div class="flex flex-wrap mt-3 -mx-2 space-x-4 md:space-x-0">
                    @foreach($product->images as $image)
                        <img alt="image-tag-one" class="small-img sm:w-1/3 px-2 mb-4 md:max-h-32 lg:max-h-32 object-cover md:w-1/4 lg:w-1/4 w-full" src="@if($image === null) https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg  @else {{ asset('images/' . $image->image_path) }} @endif" />
                            
                            <!-- md:w-32 md:h-32 -->
                            <!-- <img class="w-full" alt="image of a girl posing" src="https://i.ibb.co/QMdWfzX/component-image-one.png" /> -->
                            <!-- <img class="mt-6 w-full" alt="image of a girl posing" src="https://i.ibb.co/qxkRXSq/component-image-two.png" /> -->
                    @endforeach
                </div>
            </div> 
            <div class="md:hidden">
                <img class="w-full object-cover object-center" id="ProductImg" alt="image of a girl posing" src="https://i.ibb.co/QMdWfzX/component-image-one.png" />
                <div class="flex items-center justify-between mt-3 space-x-4 md:space-x-0">
                    <img alt="image-tag-one" class="small-img md:w-48 md:h-48 w-full" src="https://i.ibb.co/cYDrVGh/Rectangle-245.png" />
                    <img alt="image-tag-one" class="small-img md:w-48 md:h-48 w-full" src="https://i.ibb.co/f17NXrW/Rectangle-244.png" />
                    <img alt="image-tag-one" class="small-img md:w-48 md:h-48 w-full" src="https://i.ibb.co/cYDrVGh/Rectangle-245.png" />
                    <img alt="image-tag-one" class="small-img md:w-48 md:h-48 w-full" src="https://i.ibb.co/f17NXrW/Rectangle-244.png" />
                </div>
            </div>
            <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
                <div class="border-b border-gray-200 pb-6">
                    <p class="text-sm leading-none text-gray-600 dark:text-gray-300 ">Balenciaga Fall Collection</p>
                    <h1 class="lg:text-2xl text-xl font-semibold lg:leading-6 leading-7 text-gray-800 dark:text-white mt-2">Balenciaga Signature Sweatshirt</h1>
                </div>
                <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                    <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Colours</p>
                    <div class="flex items-center justify-center">
                        <p class="text-sm leading-none text-gray-600 dark:text-gray-300">Smoke Blue with red accents</p>
                        <div class="w-6 h-6 bg-gradient-to-b from-gray-900 to-indigo-500 ml-3 mr-4 cursor-pointer"></div>
                        <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg2.svg" alt="next">
                        <img class="hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg2dark.svg" alt="next">   
                    </div>
                </div>
                <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                    <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Size</p>
                    <div class="flex items-center justify-center">
                        <p class="text-sm leading-none text-gray-600 dark:text-gray-300 mr-3">38.2</p>
                        
                        <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg2.svg" alt="next">
                        <img class="hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg2dark.svg" alt="next">  
                    </div>
                </div>
                <button class="dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100 focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4 hover:bg-gray-700 focus:outline-none">
                    <img class="mr-3 dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/svg1.svg" alt="location">
                    <img class="mr-3 hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/svg1dark.svg" alt="location">
                    Check availability in store
                </button>
                <div>
                    <p class="xl:pr-48 text-base lg:leading-tight leading-normal text-gray-600 dark:text-gray-300 mt-7">It is a long established fact that a reader will be distracted by thereadable content of a page when looking at its layout. The point of usingLorem Ipsum is that it has a more-or-less normal distribution of letters.</p>
                    <p class="text-base leading-4 mt-7 text-gray-600 dark:text-gray-300">Product Code: 8BN321AF2IF0NYA</p>
                    <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">Length: 13.2 inches</p>
                    <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">Height: 10 inches</p>
                    <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">Depth: 5.1 inches</p>
                    <p class="md:w-96 text-base leading-normal text-gray-600 dark:text-gray-300 mt-4">Composition: 100% calf leather, inside: 100% lamb leather</p>
                </div>
                <div>
                    <div class="border-t border-b py-4 mt-7 border-gray-200">
                        <div data-menu class="flex justify-between items-center cursor-pointer">
                            <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Shipping and returns</p>
                            <button class="cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 rounded" role="button" aria-label="show or hide">
                                <img class="transform dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg4.svg" alt="dropdown">
                                <img class="transform hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg4dark.svg" alt="dropdown">
                            </button>
                        </div>
                        <div class="hidden pt-4 text-base leading-normal pr-12 mt-4 text-gray-600 dark:text-gray-300" id="sect">You will be responsible for paying for your own shipping costs for returning your item. Shipping costs are nonrefundable</div>
                    </div>
                </div>
                <div>
                    <div class="border-b py-4 border-gray-200">
                        <div data-menu class="flex justify-between items-center cursor-pointer">
                            <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Contact us</p>
                            <button class="cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 rounded" role="button" aria-label="show or hide">
                                <img class="transform dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg4.svg" alt="dropdown">
                                <img class="transform hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg4dark.svg" alt="dropdown">
                            </button>
                        </div>
                        <div class="hidden pt-4 text-base leading-normal pr-12 mt-4 text-gray-600 dark:text-gray-300" id="sect">If you have any questions on how to return your item to us, contact us.</div>
                    </div>
                </div>
            </div>
        </div>
        
        
    
<script>
let elements = document.querySelectorAll("[data-menu]");
for (let i = 0; i < elements.length; i++) {
    let main = elements[i];
    main.addEventListener("click", function () {
        let element = main.parentElement.parentElement;
        let andicators = main.querySelectorAll("img");
        let child = element.querySelector("#sect");
        child.classList.toggle("hidden");
        andicators[0].classList.toggle("rotate-180");
    });


    let ProductImg = document.getElementById("ProductImg");
    let SmallImg = document.getElementsByClassName("small-img");

    console.log(SmallImg[0].getAttribute('src'));

      SmallImg[0].onclick = function () {
        ProductImg.src = SmallImg[0].src;
        
      };

      SmallImg[1].onclick = function () {
        ProductImg.src = SmallImg[1].src;
      };

      SmallImg[2].onclick = function () {
        ProductImg.src = SmallImg[2].src;
      };

      SmallImg[3].onclick = function () {
        ProductImg.src = SmallImg[3].src;
      };
}

</script>




@endsection