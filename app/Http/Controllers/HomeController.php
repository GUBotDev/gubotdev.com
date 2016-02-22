<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller {
    public function getIndex() {
        return view('welcome');
    }
}
