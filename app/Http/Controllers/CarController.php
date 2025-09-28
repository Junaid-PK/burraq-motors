<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::available()->latest();

        // Search functionality
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Filter by make
        if ($request->filled('make')) {
            $query->where('make', $request->make);
        }

        // Filter by price range
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Filter by year range
        if ($request->filled('min_year')) {
            $query->where('year', '>=', $request->min_year);
        }
        if ($request->filled('max_year')) {
            $query->where('year', '<=', $request->max_year);
        }

        $cars = $query->paginate(12);
        
        // Get unique makes for filter
        $makes = Car::available()->distinct()->pluck('make')->sort();

        return view('cars.index', compact('cars', 'makes'));
    }

    public function show(Car $car)
    {
        // Get related cars (same make, different model)
        $relatedCars = Car::available()
            ->where('make', $car->make)
            ->where('id', '!=', $car->id)
            ->take(4)
            ->get();

        return view('cars.show', compact('car', 'relatedCars'));
    }

    public function compare()
    {
        $compareCars = session('compare_cars', []);
        $cars = Car::whereIn('id', $compareCars)->get();

        return view('cars.compare', compact('cars'));
    }

    public function addToCompare(Request $request)
    {
        $carId = $request->car_id;
        $compareCars = session('compare_cars', []);

        if (!in_array($carId, $compareCars) && count($compareCars) < 3) {
            $compareCars[] = $carId;
            session(['compare_cars' => $compareCars]);
            
            return response()->json([
                'success' => true,
                'message' => 'Car added to comparison',
                'count' => count($compareCars)
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => count($compareCars) >= 3 ? 'Maximum 3 cars can be compared' : 'Car already in comparison'
        ]);
    }

    public function removeFromCompare(Car $car)
    {
        $compareCars = session('compare_cars', []);
        $compareCars = array_filter($compareCars, fn($id) => $id != $car->id);
        session(['compare_cars' => array_values($compareCars)]);

        return redirect()->route('cars.compare');
    }
}
