<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Brand;

class BrandComponent extends Component
{
    public $brand;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($brand)
    {
        // $this->brands = Brand::all();
        $this->brand = $brand;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.brand-component');
    }
}