<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private array $base_validation = [
        'name' => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'address' => 'nullable|string|max:255',
        'zip' => 'nullable|integer',
        'city' => 'nullable|string|max:255',
        'updated_at' => 'nullable|date',
        'is_active' => 'nullable|boolean'
    ];

    private function custom_validation(array $custom_validators): array {
        return array_merge($this->base_validation, $custom_validators);
    }

    public function index() {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create() {
        return view('customers.create');
    }

    public function store(Request $req) {
        $req->validate($this->custom_validation([
            'created_at' => 'nullable|date'
        ]));

        $req->all();

    }
}
