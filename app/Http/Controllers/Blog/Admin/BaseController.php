<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\BaseController as GuestBaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class BaseController to extend admin controllers
 * @package App\Http\Controllers\Blog\Admin
 */

abstract class BaseController extends GuestBaseController
{
    public function __construct()
    {
        //
    }
}
