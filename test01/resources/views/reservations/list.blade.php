@extends('layouts.app')

@section('content')
    <div class="reservation-list-container container">
        <h1>Cars</h1>
{{--        <a href="{{route('reservations.create')}}" class="btn btn-primary">Add New Car</a>--}}
        <table class="car-list table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Start</th>
                <th>End</th>
{{--                <th>Actions</th>--}}
            </tr>
            </thead>
            <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{$reservation->name}}</td>
                    <td>{{$reservation->start_date}}</td>
                    <td>{{$reservation->end_date}}</td>
{{--                    <td>--}}
{{--                        <a href="{{ route('reservations.edit', $car->id) }}" class="btn btn-warning">Edit</a>--}}
{{--                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                            <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                        </form>--}}
{{--                    </td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
