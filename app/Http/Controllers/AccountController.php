<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AccountController extends Controller {

	public function __construct() {

	}

    public function getAccountIndex() {
        return view('account.index');
    }

    public function getAccountSettings() {
    	return view('account.settings');
    }

    public function postAccountSettings() {
    	
    }

    public function getOrdersIndex() {
    	return view('account.ordersIndex');
    }

    public function getOrder($slug) {
    	return view('account.ordersIndividual');
    }

    public function getOrder($slug) {
    	
    }

}
