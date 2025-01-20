@extends('layouts.app')

@section('content')
    <div class="car-rent-list-container container">
        <h1>Rent a Car</h1>
        <form action="{{route('rent.index')}}" method="GET">
            <div class="form-group">
                <label for="from">From</label>
                <input type="date" id="from" name="from" class="form-control" value="{{date_format($start, 'Y-m-d')}}">
            </div>

            <div class="form-group">
                <label for="to">To</label>
                <input type="date" id="to" name="to" class="form-control" value="{{date_format($end, 'Y-m-d')}}">
            </div>

            <button type="submit" class="btn btn-primary">Search</button>
        </form>
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
                    <td>
                        <form action="{{url("/rent/$car->id/rent")}}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="from" value="{{$start}}">
                            <input type="hidden" name="to" value="{{$end}}">
                            <button type="submit" class="btn btn-primary">Rent</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
