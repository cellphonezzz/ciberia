<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\BookService;

class BaseContoller extends Controller
{
    public $service;

    public function __construct(BookService $service) {
        $this->service = $service;
    }

}
