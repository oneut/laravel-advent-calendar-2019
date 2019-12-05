<?php
/**
 * Created by PhpStorm.
 * User: Takashi
 * Date: 2019/11/14
 * Time: 16:22
 */

namespace App\Http\Controllers;


use App\Jobs\TestJob;

class HomeController extends Controller
{
    public function index() {
        return view("index");
    }

    public function store() {
        $this->dispatchNow(new TestJob(1));
    }
}
