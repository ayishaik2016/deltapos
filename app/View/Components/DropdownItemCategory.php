<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Items\ItemCategory;

class DropdownItemCategory extends Component
{
    /**
     * Categories array
     *
     * @var array
     */
    public $categories;

    /**
     * Selected option
     *
     * @var string
     */
    public $selected;

    /**
     * Multiple Selection box
     * @return boolean
     * */
    public $isMultiple;

    /**
     * Show Select Option All
     *
     * @var Boolean
     */
    public $showSelectOptionAll;

    /**
     * Category list is find corresponding
     *
     * @var Boolean
     */
    public $selectedCategories;

    /**
     * Create a new component instance.
     */
    public function __construct($selected = null, $isMultiple = false, $showSelectOptionAll = false, $selectedCategories = '')
    {
        $itemCategories = ItemCategory::select('id','name');
        if($selectedCategories != '') {
            $itemCategories = $itemCategories->whereIn('id', config('constants.' . $selectedCategories));
        }

        $this->categories = $itemCategories->get();
        $this->selected = $selected;
        $this->isMultiple = $isMultiple;
        $this->showSelectOptionAll = $showSelectOptionAll;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dropdown-item-category');
    }
}
