<?php
/**
 * Created by PhpStorm.
 * User: Takashi
 * Date: 2019/12/07
 * Time: 10:28
 */

namespace App\Http\Repositories;


use App\Models\Eloquent\Order;

class OrderRepository
{
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function get() {
        return $this->order->with([
            'orderSubtotal'
        ])->get();
    }
}
