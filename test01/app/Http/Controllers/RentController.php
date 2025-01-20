<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RentController extends Controller {
    public function index() {
        $now = Carbon::now();
        $fourDays = $now->copy()->addDays(4);

        $cars = DB::table('reservation as r')
            ->join('car as c', 'c.id', '=', 'r.car_id')
            ->select('c.brand', 'c.name', 'c.price', 'c.fuel_type')
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
}
