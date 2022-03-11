<?php

namespace App\View\Components\Company;

use Illuminate\View\Component;

class Show extends Component
{

    public $company;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($company)
    {
        $this->company = $company;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.company.show');
    }
}
