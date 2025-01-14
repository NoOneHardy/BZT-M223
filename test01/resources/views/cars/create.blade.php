@extends('layouts.app')

@section('content')
    <div class="car-create-container container">
        <h1>Create Car</h1>
        <form action="{{route('cars.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step=".01" name="price" id="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="fuel_type">Fuel</label>
                <input type="text" name="fuel_type" id="fuel_type" class="form-control" required>
            </div>
            <div class="actions">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('cars.index')}}" class="btn btn-secondary float-end">Cancel</a>
            </div>
        </form>
    </div>
@endsection
