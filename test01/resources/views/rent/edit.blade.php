@extends('layouts.app')

@section('content')
    <div class="car-edit-container container">
        <h1>Edit Car</h1>
        <form action="{{ route('cars.update', $car->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required value="{{$car->name}}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" required value="{{$car->price}}">
            </div>
            <div class="form-group">
                <label for="fuel_type">Fuel</label>
                <input type="text" name="fuel_type" id="fuel_type" class="form-control" required value="{{$car->fuel_type}}">
            </div>
            <div class="actions">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('cars.index') }}" class="btn btn-secondary float-end">Cancel</a>
            </div>
        </form>
    </div>
@endsection
