<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    //
    public $JS_BASE_URL;
    public $JS_USERNAME;
    public $JS_PASSWORD;
    public $JS_TEMPLATE;
    public function __construct(){
        $this->JS_BASE_URL = env('JS_BASE_URL');
        $this->JS_USERNAME = env('JS_USERNAME');
        $this->JS_PASSWORD = env('JS_PASSWORD');
        $this->JS_TEMPLATE = env('JS_TEMPLATE');
    }
}
