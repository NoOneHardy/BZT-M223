<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    private array $base_validation = [
        'customer_id' => 'required|integer|min:1',
        'car_id' => 'required|integer|min:1',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'updated_at' => 'nullable|date',
        'is_active' => 'nullable|boolean'
    ];

    private function custom_validation(array $custom_validators): array {
        return array_merge($this->base_validation, $custom_validators);
    }

    public function index() {
        $reservations = DB::table('reservation')
            ->join('car', 'car.id', '=', 'reservation.car_id')
            ->join('customer', 'customer.id', '=', 'reservation.customer_id')
            ->where('reservation.is_active', '=', 1)
            ->select('reservation.start_date', 'reservation.end_date', 'car.name as car_name', 'car.price', 'customer.name', 'customer.first_name')
            ->orderBy('reservation.start_date')
            ->get();
        return view('reservations.index', compact('reservations'));
    }
}
