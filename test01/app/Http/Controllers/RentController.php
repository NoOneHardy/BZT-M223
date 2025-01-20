<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Factory;
use Illuminate\View\View;
use function PHPUnit\Framework\arrayHasKey;

class RentController extends Controller {
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('permission:view-rents', ['only' => ['index', 'rent']]);
    }

    public function index(Request $request): View|Application|Factory {

        if (!array_key_exists('from', $request->all())) {
            $start = Carbon::now();
        } else {
            $start = Carbon::createFromFormat('Y-m-d', str($request->all()['from']));
        }

        if (!array_key_exists('to', $request->all())) {
            $end = $start->copy()->addDays(4);
        } else {
            $end = Carbon::createFromFormat('Y-m-d', str($request->all()['to']));
        }

        $cars = Car::query()
            ->select('id', 'brand', 'name', 'price', 'fuel_type')
            ->whereNotIn('id', function ($query) use ($start, $end) {
                $query->select('car_id')
                    ->from('reservation')
                    ->where(function ($query) use ($start, $end) {
                        $query->whereBetween('start_date', [$start, $end])
                            ->orWhereBetween('end_date', [$start, $end])
                            ->orWhere(function ($query) use ($start, $end) {
                                $query->where('start_date', '<=', $start)
                                    ->where('end_date', '>=', $end);
                            });
                    })
                    ->where('is_active', true)
                    ->whereNull('deleted_at');
            })
            ->get();

        return view('rent.index', compact('cars', 'start', 'end'));
    }

    public function rent(Request $request, Car $car) {
        DB::beginTransaction();
        $corporate = Customer::query()->where('id', '=', '1')->first();

        if (!$corporate) {
            DB::rollBack();
            return 'rent.asdfasdf';
        }

        $reservation = new Reservation();
        $reservation->customer_id = 1;
        $reservation->car_id = $car->id;
        $reservation->start_date = $request->all()['from'];
        $reservation->end_date = $request->all()['to'];
        $reservation->is_active = true;

        $reservation->save();

        $request->session()->put('reservation_id', $reservation->id);

        DB::commit();

        return redirect()->route('cars.index');
    }
}
