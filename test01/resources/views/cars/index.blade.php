@extends('layouts.app')

@section('content')
    <div class="car-list-container container">
        <h1>Cars</h1>
        <a href="{{route('cars.create')}}" class="btn btn-primary">Add New Car</a>
        <table class="car-list table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Fuel</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cars as $car)
                <tr>
                    <td>{{$car->name}}</td>
                    <td>{{$car->price}}</td>
                    <td>{{$car->fuel_type}}</td>
                    <td>
                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
