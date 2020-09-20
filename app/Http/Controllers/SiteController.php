<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function index () {

        return view('pages.home');
    }


    public function about_us () {

        return view('pages.about_us');
    }

    
    public function contact_us () {

        return view('pages.contact_us');
    }


    public function services () {

        return view('pages.services', [
            'services' => [
                'Web Designing',
                'Web Application',
                'Software Engineering',
                'SEO'
            ]
        ]);
    }

 
    
}
