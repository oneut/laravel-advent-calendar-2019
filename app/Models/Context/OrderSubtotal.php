<?php
/**
 * Created by PhpStorm.
 * User: Takashi
 * Date: 2019/12/07
 * Time: 10:03
 */

namespace App\Models\Context;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class OrderSubtotal extends Model
{
    protected $table = 'order_item_prices';

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('fromSub', function (Builder $builder) {
            $sql = <<< EOF
SELECT
       orders.id as order_id,
       sum(items.price) as subtotal
FROM orders
       LEFT JOIN item_order
         ON orders.id = item_order.order_id
       LEFT JOIN items
         ON items.id = item_order.item_id
group by orders.id

EOF;
            $builder->fromSub($sql, 'order_item_prices');
        });
    }

    public function scopeOfOrderId($query, $orderId)
    {
        return $query->where('order_id', $orderId);
    }
}
