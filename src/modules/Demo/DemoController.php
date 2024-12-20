<?php

namespace Modules\Demo;

use Illuminate\Routing\Controller;

class DemoController extends Controller
{
    public function index()
    {
        return response("It works!");
    }
}
