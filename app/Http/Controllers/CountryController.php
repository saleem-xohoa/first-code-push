<?php

namespace App\Http\Controllers;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
{
    $countries = Country::with('reporters')->with('articles')->find(1);
    return $countries; // a Collection of Country models, each with ->articles loaded
}
}