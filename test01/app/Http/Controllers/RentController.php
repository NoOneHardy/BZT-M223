<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Factory;
use Illuminate\View\View;

class RentController extends Controller {
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('permission:view-rents', ['only' => ['index', 'rent']]);
    }

    public function index(): View|Application|Factory {
        $now = Carbon::now();
        $fourDays = $now->copy()->addDays(4);

        $cars = DB::table('reservation as r')
            ->join('car as c', 'c.id', '=', 'r.car_id')
            ->select('c.id', 'c.brand', 'c.name', 'c.price', 'c.fuel_type')
            ->whereNotIn('r.id', function ($query) use ($now, $fourDays) {
                $query->select('r2.id')
                    ->from('reservation as r2')
                    ->where(function ($query) use ($now, $fourDays) {
                        $query->whereBetween('r2.start_date', [$now, $fourDays])
                            ->orWhereBetween('r2.end_date', [$now, $fourDays])
                            ->orWhere(function ($query) use ($now, $fourDays) {
                                $query->where('r2.start_date', '<=', $now)
                                    ->where('r2.end_date', '>=', $fourDays);
                            });
                    })
                    ->where('r2.is_active', true)
                    ->whereNull('r2.deleted_at');
            })
            ->get();

        return view('rent.index', compact('cars'));
    }

    public function rent(Request $request, Car $car) {


        return redirect()->route('rent.index');
    }
}
