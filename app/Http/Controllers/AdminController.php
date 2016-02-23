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
        return view('admin.projectsIndex');
    }

    public function getProject($slug) {
    	return view('admin.projectsIndividual');
    }

    public function postProject($slug) {
    	
    }

    public function getOrdersIndex() {
    	return view('admin.ordersIndex');
    }

    public function getOrder($slug) {
		return view('admin.ordersIndividual');
    }

    public function postOrder($slug) {

    }

    public function getVideosIndex() {
    	return view('admin.videosIndex');
    }

    public function getVideo($slug) {
    	return view('admin.videosIndividual');
    }

    public function postVideo($slug) {

    }

}
