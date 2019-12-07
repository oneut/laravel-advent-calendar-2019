<?php
/**
 * Created by PhpStorm.
 * User: Takashi
 * Date: 2019/12/07
 * Time: 10:09
 */

namespace App\Http\Repositories;


use App\Models\Context\OrderSubtotal;

class OrderSubtotalRepository
{
    private $orderSubtotal;

    public function __construct(OrderSubtotal $orderSubtotal)
    {
        $this->orderSubtotal = $orderSubtotal;
    }

    public function get() {
        return $this->orderSubtotal->get();
    }

    public function findByOrderId($orderId) {
        return $this->orderSubtotal->ofOrderId($orderId)->first();
    }
}
