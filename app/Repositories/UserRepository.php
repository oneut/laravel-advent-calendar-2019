<?php
/**
 * Created by PhpStorm.
 * User: Takashi
 * Date: 2019/12/07
 * Time: 0:54
 */

namespace App\Http\Repositories;

use App\Models\Eloquent\User;


class UserRepository
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function get() {
        return $this->user->get();
    }
}
