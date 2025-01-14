<?php

namespace App\Http\Controllers;

class HelloWorldController extends Controller {
    public function index() {
        return view('hello-world', [
            'info' => 'Test'
        ]);
    }
}
