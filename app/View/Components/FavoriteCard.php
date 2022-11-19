<?php

namespace App\View\Components;

use App\Models\Favorite;
use Illuminate\View\Component;

class FavoriteCard extends Component
{
    public $favorite;

    public function __construct(Favorite $favorite)
    {
        $this->favorite = $favorite;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.favorite-card');
    }
}
