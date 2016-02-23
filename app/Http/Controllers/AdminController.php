<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AdminController extends Controller {

	public function __construct() {

	}

    public function getAdminIndex() {
        return view('admin.index');
    }

    public function getProjectsIndex() {
        return view('admin.index');
    }

    public function getProject($slug) {

    }

    public function postProject($slug) {
    	
    }

    public function getOrdersIndex() {

    }

    public function getOrder($slug) {

    }

    public function postOrder($slug) {

    }

    public function getVideosIndex() {

    }

    public function getVideo($slug) {

    }

    public function postVideo($slug) {

    }

}
