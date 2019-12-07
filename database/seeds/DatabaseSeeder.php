<?php

use App\Models\Eloquent\Drink;
use App\Models\Eloquent\Hamburger;
use App\Models\Eloquent\HamburgerSet;
use App\Models\Eloquent\Item;
use App\Models\Eloquent\Order;
use App\Models\Eloquent\SideMenu;
use App\Models\Eloquent\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        factory(User::class, 10)->create();
        factory(HamburgerSet::class, 10)->create()->each(function ($hamburgerSet) {
            $hamburgerSet->hamburger()->create(factory(Hamburger::class)->make()->toArray());
            $hamburgerSet->drink()->create(factory(Drink::class)->make()->toArray());
            $hamburgerSet->sideMenu()->create(factory(SideMenu::class)->make()->toArray());
        });

        factory(HamburgerSet::class)->create();

        factory(Order::class, 10)->create()->each(function ($order) {
            factory(Item::class, 10)->create()->each(function ($item) use ($order) {
                $order->items()->attach($item->id);
            });
        });
    }
}
