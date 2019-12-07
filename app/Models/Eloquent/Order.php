<?php
/**
 * Created by PhpStorm.
 * User: Takashi
 * Date: 2019/12/07
 * Time: 9:41
 */

namespace App\Models\Eloquent;


use App\Models\Context\OrderSubtotal;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Items relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function items() {
        return $this->belongsToMany(Item::class);
    }

    /**
     * Order subtotal relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orderSubtotal() {
        return $this->hasOne(OrderSubtotal::class);
    }
}
