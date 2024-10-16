<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function viewPrivacyPolicyPage()
    {
        return view('privacy-policy');
    }

    public function viewTermsAndConditionsPage()
    {
        return view('terms-and-conditions');
    }

    public function viewContactUsPage()
    {
        return view('contact-us');
    }
}
