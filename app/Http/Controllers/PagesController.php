<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PagesController extends Controller {
	
	public function __construct() {

	}

	// PROJECTS
    public function getProjectsIndex() {
        return view('pages.projectsIndex');
    }

    public function getProject($slug) {
        return view('pages.projectsIndividual');
    }

    // VIDEOS
    public function getVideosIndex() {
        return view('pages.videosIndex');
    }

    public function getVideo($slug) {
        return view('pages.projectsIndividual');
    }

    // CONTACT
    public function getContactPage() {
        return view('pages.contact');
    }

    public function postContactPage($slug) {

    }
}
