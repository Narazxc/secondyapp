<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserPreferenceForm extends Component
{

    public $categories;
    public $currentStep = 1;
    public $totalSteps = 3;
    public $selectedBadges = [];
    public $priceRanges;
    public $selectedPriceRange;
    public $terms;


    public function mount() {
        $this->currentStep = 1;

        $this->categories = Category::all();
        $this->priceRanges = [
            'Normal Product' => '0-50',
            'Expensive Product' => '500-1000',
            'Extra Expensive Product' => '1000-1500',
            'Super Expensive Product' => '1500-2000',
        ];

    }

    public function render()
    {
        return view('livewire.user-preference-form');
    }



    public function increaseStep (){
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalSteps){
            $this->currentStep = $this->totalSteps;
        }

    }

    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

    public function validateData(){
        if ($this->currentStep == 1){
            $this->validate([
                'selectedBadges' => 'required|array|min:3|max:3',
            ], [
            'selectedBadges.required' => 'Please select 3 categories.',
            'selectedBadges.min' => 'Please select 3 categories.',
            'selectedBadges.max' => 'Please select 3 categories.',
        ]);
        }
// |in:0 - 50,500 - 1000,1000 - 1500,1500 - 2000'
        elseif ($this->currentStep == 2){
            $this->validate([
            'selectedPriceRange' => 'required|in:0-50,500-1000,1000-1500,1500-2000',
            ], [
                'selectedPriceRange.required' => 'Please select a price range option.',
                'selectedPriceRange.in' => 'Please select a valid price range option.',
            ]);
            
        }

    }

    public function submit(Request $request){
        $this->resetErrorBag();
        if($this->currentStep == 3){
            $this->validate([
                'terms' => 'accepted'
            ]);
        }

        // dd('Now, you can submit form');

        // Retrieve the authenticated user
        $user = $request->user();
        

        // Create or update the UserPersonalizedPreferences record
        if ($user->preference) {

            // Update existing record
            $user->preference->update([
                'category' => json_encode($this->selectedBadges),
                'price_range' => $this->selectedPriceRange,
            ]);

        } else {

            // Create new record
            $user->preference()->create([
                'category' => json_encode($this->selectedBadges),
                'price_range' => $this->selectedPriceRange,
            ]);

            
        }

        // Update the wizard_completed field to 1
        $user->update([
            'wizard_completed' => 1,
        ]);

        // Redirect the user to the homepage
        return redirect()->route('homepage');
    }



    public function selectPriceRange($value){
        
        $this->selectedPriceRange = $value;
        
    }


    public function selectCategory($categoryId)
    {
        if (in_array($categoryId, $this->selectedBadges)) {
            // If the category is already selected, remove it
            $this->selectedBadges = array_diff($this->selectedBadges, [$categoryId]);
        } else {
            // If the category is not selected, add it if the limit is not reached
            if (count($this->selectedBadges) < 3) {
                $this->selectedBadges[] = $categoryId;
            }
        }
    }

     public function unselectBadge($categoryId)
    {
        if (in_array($categoryId, $this->selectedBadges)) {
            // If the category is already selected, remove it
            $this->selectedBadges = array_diff($this->selectedBadges, [$categoryId]);
        } else {
            // If the category is not selected, add it if the limit is not reached
            if (count($this->selectedBadges) < 3) {
                $this->selectedBadges[] = $categoryId;
            }
        }
    }
}
