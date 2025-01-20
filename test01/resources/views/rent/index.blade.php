@extends('layouts.app')

@section('content')
    <div class="car-list-container container">
        <h1>Rent a Car</h1>
        <table class="car-list table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Fuel</th>
                @canany(['delete-cars', 'edit-cars'])
                    <th>Actions</th>
                @endcanany
            </tr>
            </thead>
            <tbody>
            @foreach($cars as $car)
                <tr>
                    <td>{{$car->name}}</td>
                    <td>{{$car->price}}</td>
                    <td>{{$car->fuel_type}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
