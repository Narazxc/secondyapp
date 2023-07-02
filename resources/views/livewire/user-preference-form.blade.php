<div class="pb-20 pl-10 pr-10 h-full">

    <form wire:submit.prevent="submit"  method="POST" enctype="multipart/form-data" class="h-full" >
        @csrf

        @if($currentStep == 1)
        <div>
            <ol class="items-center w-full justify-evenly space-y-4 sm:flex sm:space-x-8 sm:space-y-0">
                <li class="flex items-center text-blue-600 dark:text-blue-500 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                        1
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Category</h3>
                        <p class="text-sm">Please choose 3 categories</p>
                    </span>
                </li>
                <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                        2
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Price range</h3>
                        <p class="text-sm">Please choose a price range</p>
                    </span>
                </li>
                <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                        3
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Finishing up</h3>
                        <p class="text-sm">Confirm to complete the wizard/walkthrough</p>
                    </span>
                </li>
            </ol>
    


            <div class="flex justify-center mt-16 mb-16">
                <h2 class="text-3xl font-bold">Choose Categories</h2>
            </div>

            <div class="w-full flex justify-center">

                <div class="flex flex-wrap justify-center  w-96">
                
                    @foreach($categories as $category)
                    <div wire:key="{{ $category->id }}">

                        <span  wire:click="selectCategory({{ $category->id }})" id="badge-dismiss-indigo" class="inline-flex cursor-pointer bg-indigo-100 hover:bg-indigo-200 active:bg-indigo-300 rounded-full items-center px-4 mb-3 py-2 mr-2 text-sm font-medium text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300
                        {{ in_array($category->id, $selectedBadges) ? 'text-white bg-indigo-600 hover:bg-indigo-800' : 'text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300' }}">
                            {{ $category->name }}
            
                            <form wire:submit.prevent="someAction">
            
                                <button type="submit" class="flex items-center  p-0.5 ml-2 text-sm text-indigo-400 bg-transparent rounded-sm hover:bg-indigo-300 hover:text-indigo-900 dark:hover:bg-indigo-800 dark:hover:text-indigo-300" data-dismiss-target="#badge-dismiss-indigo" aria-label="Remove">
                                    <svg aria-hidden="true" class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Remove badge</span>
                                </button>
                            </form>
                        </span>
                    </div>
                    @endforeach
                </div>

            </div>
            @if ($errors->has('selectedBadges'))
                    <p class="text-red-500 text-sm">{{ $errors->first('selectedBadges') }}</p>
                @endif
        </div>
        @endif


        @if($currentStep == 2)
        <div>
            <ol class="items-center w-full justify-evenly space-y-4 sm:flex sm:space-x-8 sm:space-y-0">
            <li class="flex items-center text-green-600 dark:text-green-500 space-x-2.5">
                <span class="flex items-center justify-center w-8 h-8 border border-green-600 rounded-full shrink-0 dark:green-blue-500">
                    1
                </span>
                <span>
                    <h3 class="font-medium leading-tight">Category</h3>
                    <p class="text-sm">Please choose 3 categories</p>
                </span>
            </li>
         
                <li class="flex items-center text-blue-600 dark:text-blue-500 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                        2
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Price range</h3>
                        <p class="text-sm">Please choose a price range</p>
                    </span>
                </li>
                <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                        3
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Finishing up</h3>
                        <p class="text-sm">Confirm to complete the wizard/walkthrough</p>
                    </span>
                </li>
            </ol>
    


            <div class="flex justify-center mt-16 mb-16">
                <h2 class="text-3xl font-bold">Choose Price Range</h2>
            </div>

            <div class="w-full flex justify-center">

            <ul class="grid w-full gap-6 md:grid-cols-2">
                @foreach($priceRanges as $key => $value)
                    <!-- <li>
                        <input type="radio" id="{{ $key }}" name="hosting" value="{{ $key }}" class="hidden peer" required>
                        <label for="{{ $key }}" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <div class="block">
                                <div class="w-full text-lg font-semibold">${{ $value }}</div>
                                <div class="w-full">Cheap product</div>
                            </div>
                            <svg aria-hidden="true" class="w-6 h-6 ml-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </label>
                    </li> -->
                    <li wire:key="{{ Str::slug($key) }}">
                        <input wire:click="selectPriceRange('{{ $value }}')" type="radio" id="{{ Str::slug($key) }}" name="price_range" value="{{ $value }}" class="hidden peer" required @if($selectedPriceRange === $value) checked @endif>
                        <label for="{{ Str::slug($key) }}" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <div class="block">
                                <div class="w-full text-lg font-semibold">{{ $key }}</div>
                                <div class="w-full">${{ $value }}</div>
                            </div>
                            <svg aria-hidden="true" class="w-6 h-6 ml-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </label>
                      
                    </li>
                @endforeach
                @if ($errors->has('selectedPriceRange'))
                    <div class="text-red-500">{{ $errors->first('selectedPriceRange') }}</div>
                @endif
                <!-- <li>
                    <input type="radio" id="hosting-small" name="hosting" value="hosting-small" class="hidden peer" required>
                    <label for="hosting-small" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                        <div class="block">
                            <div class="w-full text-lg font-semibold">$0-50</div>
                            <div class="w-full">Good for small websites</div>
                        </div>
                        <svg aria-hidden="true" class="w-6 h-6 ml-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </label>
                </li>
                <li>
                    <input type="radio" id="hosting-big" name="hosting" value="hosting-big" class="hidden peer">
                    <label for="hosting-big" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class="block">
                            <div class="w-full text-lg font-semibold">$500-1000</div>
                            <div class="w-full">Good for large websites</div>
                        </div>
                        <svg aria-hidden="true" class="w-6 h-6 ml-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </label>
                </li>

                <li>
                    <input type="radio" id="hosting-small2" name="hosting" value="hosting-small2" class="hidden peer" required>
                    <label for="hosting-small2" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                        <div class="block">
                            <div class="w-full text-lg font-semibold">$1000-1500</div>
                            <div class="w-full">Good for small websites</div>
                        </div>
                        <svg aria-hidden="true" class="w-6 h-6 ml-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </label>
                </li>
                <li>
                    <input type="radio" id="hosting-big2" name="hosting" value="hosting-big2" class="hidden peer">
                    <label for="hosting-big2" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class="block">
                            <div class="w-full text-lg font-semibold">$1500-2000</div>
                            <div class="w-full">Good for large websites</div>
                        </div>
                        <svg aria-hidden="true" class="w-6 h-6 ml-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </label>
                </li> -->
            </ul>

            </div>
        </div>
        @endif

        @if($currentStep == 3)
        <div>
            <ol class="items-center w-full justify-evenly space-y-4 sm:flex sm:space-x-8 sm:space-y-0">
            <li class="flex items-center text-green-600 dark:text-green-500 space-x-2.5">
                <span class="flex items-center justify-center w-8 h-8 border border-green-600 rounded-full shrink-0 dark:green-blue-500">
                    1
                </span>
                <span>
                    <h3 class="font-medium leading-tight">Category</h3>
                    <p class="text-sm">Please choose 3 categories</p>
                </span>
            </li>
         
                <li class="flex items-center text-green-600 dark:text-green-500 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-green-600 rounded-full shrink-0 dark:green-blue-500">
                        2
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Price range</h3>
                        <p class="text-sm">Please choose a price range</p>
                    </span>
                </li>
                <li class="flex items-center text-blue-600 dark:text-blue-500 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                        3
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Finishing up</h3>
                        <p class="text-sm">Confirm to complete the wizard/walkthrough</p>
                    </span>
                </li>
            </ol>
    


            <div class="flex justify-center mt-16 mb-16">
                <h2 class="text-3xl font-bold">Finishing up</h2>
            </div>

            <div class="w-full flex flex-col justify-center">

                <div class="w-full">

                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially.

                
                </div>
              
                <div class="flex items-center mb-4 mt-4">
                    <input wire:model="terms" name="terms" id="terms" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                    <label for="terms" class="ml-2 text-md font-medium text-gray-900 dark:text-gray-300">I agree to the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a>.</label>

                  
                </div>
                @error('terms')
                    <p class="block">
                        <span class="text-red-500">{{ $message }}</span>
                    </p>
                @enderror
            </div>

        </div>

        @endif

       



  


        <div class="flex justify-end w-full mt-4">
          @if($currentStep == 1)
              <div></div>
          @endif

          @if($currentStep == 2 || $currentStep == 3)
              <button wire:click="decreaseStep()" type="button" class=" text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Back</button>
          @endif
          @if($currentStep == 1 || $currentStep == 2)
              <button wire:click="increaseStep()" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-2 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Next</button>
          @endif
          @if($currentStep == 3)
              <button wire:click="" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
          @endif
      </div>  
    </form>
 

   
</div>
