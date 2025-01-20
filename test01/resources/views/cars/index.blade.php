@extends('layouts.app')

@section('content')
    <div class="car-list-container container">
        <h1>Cars</h1>
        @can('create-cars')
            <a href="{{route('cars.create')}}" class="btn btn-primary">Add New Car</a>
        @endcan
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
                    @canany(['delete-cars', 'edit-cars'])
                        <td>
                            @can('edit-cars')
                                <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>
                            @endcan
                            @can('delete-cars')
                                <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endcan
                        </td>
                    @endcanany
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
