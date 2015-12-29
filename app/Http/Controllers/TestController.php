<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class TestController extends Controller
{
    public function getExemploSuper()
    {
        return "oi";
    }

    public function adminIndex()
    {
        return view('admin.index');
    }
}
