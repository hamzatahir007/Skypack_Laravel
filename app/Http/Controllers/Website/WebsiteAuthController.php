<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class WebsiteAuthController extends Controller
{
    public function showclientLogin() {
        return view('website.pages.login');
    }

    public function clientlogin(Request $request) {
        // logic here
    }

    public function showtravelerLogin() {
        return view('website.pages.travelerLogin');
    }

    public function travelerlogin(Request $request) {
        // logic here
    }

    public function showRegister() {
        return view('website.pages.register');
    }

    public function register(Request $request) {
        // logic here
    }

    public function dashboard() {
        return view('website.pages.home');
    }

    public function logout() {
        auth()->guard('website')->logout();
        return redirect('/');
    }
}
