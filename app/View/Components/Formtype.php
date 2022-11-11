<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Bus\Interface\IBusFeedback;

class Formtype extends Component
{
    private $busFeedback;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(IBusFeedback $busFeedback){
        
        $this->busFeedback = $busFeedback;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $TypeFeedbacks = $this->busFeedback->GetAllTypeFeedback();
        return view('components.form-type')->with('TypeFeedbacks',$TypeFeedbacks);
    }
}
