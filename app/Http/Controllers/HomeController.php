<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredCars = Car::featured()
            ->available()
            ->latest()
            ->take(6)
            ->get();

        return view('home', compact('featuredCars'));
    }
}
