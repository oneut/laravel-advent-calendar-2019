<?php
/**
 * Created by PhpStorm.
 * User: Takashi
 * Date: 2019/12/07
 * Time: 1:21
 */

namespace App\Models\Eloquent;


use Illuminate\Database\Eloquent\Model;

class HamburgerSet extends Model
{
    /**
     * Hamburger relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hamburger()
    {
        return $this->hasOne(Hamburger::class)->withDefault(function($model) {
            $model->calorie = 0;
        });
    }

    /**
     * Drink relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function drink()
    {
        return $this->hasOne(Drink::class)->withDefault(function($model) {
        $model->calorie = 0;
    });
    }

    /**
     * Side menu relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sideMenu()
    {
        return $this->hasOne(SideMenu::class)->withDefault(function($model) {
        $model->calorie = 0;
    });
    }

    /**
     * カロリー合計値
     *
     * @return
     */
    public function totalCalorie()
    {
        $hamburgerCalorie = $this->getRelation('hamburger')->calorie;
        $drinkCalorie = $this->getRelation('drink')->calorie;
        $sideMenuCalorie = $this->getRelation('sideMenu')->calorie;

        return $hamburgerCalorie + $drinkCalorie + $sideMenuCalorie;
    }
}
