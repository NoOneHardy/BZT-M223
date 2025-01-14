<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index() {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function create() {
        return view('cars.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'price' => 'required|decimal:0,2',
            'fuel_type' => 'required|string|max:255',
            'color' => 'nullable|int',
            'type' => 'nullable|string|max:255',
            'tank' => 'nullable|decimal:0,2',
            'manufacturing_date' => 'nullable|date',
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date',
            'is_active' => 'nullable|boolean'
        ]);

        Car::create($request->all());
        return redirect()->route('cars.index');
    }

    public function show(Car $car) {
        return view('cars.show', compact('car'));
    }

    public function edit(Car $car) {
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car) {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'price' => 'required|decimal:0,2',
            'fuel_type' => 'required|string|max:255',
            'color' => 'nullable|int',
            'type' => 'nullable|string|max:255',
            'tank' => 'nullable|decimal:0,2',
            'manufacturing_date' => 'nullable|date',
            'updated_at' => 'required|date',
            'is_active' => 'required|boolean'
        ]);

        $car->update($request->all());
        return redirect()->route('cars.index');
    }

    public function destroy(Car $car) {
        $car->delete();
        return redirect()->route('cars.index');
    }
}
