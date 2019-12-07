<?php
/**
 * Created by PhpStorm.
 * User: Takashi
 * Date: 2019/12/07
 * Time: 1:45
 */

namespace App\Http\Repositories;

use App\Models\Eloquent\HamburgerSet;

class HamburgerSetRepository
{
    private $hamburgerSet;

    public function __construct(HamburgerSet $hamburgerSet)
    {
        $this->hamburgerSet = $hamburgerSet;
    }

    public function get() {
        return $this->hamburgerSet->with([
            'hamburger',
            'drink',
            'sideMenu'
        ])->get();
    }
}
