<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\User;

class DropdownRoleuser extends Component
{

    /**
     * users option
     *
     * @var string
     */
    public $users;

    /**
     * Selected option
     *
     * @var string
     */
    public $selected;

    /**
     * Dropdown name or id attribute
     *
     * @var String
     */
    public $dropdownName;

    /**
     * Show Only Username
     * @return boolean
     * */
    public $showOnlyUsername;

    /**
     * Role
     * @return boolean
     * */
    public $roleName;
    
    /**
     * Create a new component instance.
     */
    public function __construct($dropdownName, $roleName, $showOnlyUsername = false, $selected = null)
    {
        $this->users = User::select('id', 'first_name', 'last_name', 'username')->where('role_id', $roleName)->get();
        $this->selected = $selected;
        $this->dropdownName = $dropdownName;
        $this->showOnlyUsername = $showOnlyUsername;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dropdown-roleuser');
    }
}
