@extends('layouts.app')

@section('content')
    <div>
        <div>
            <h1>
                Update car
            </h1>
        </div>
    </div>

    <div>
        <form action="/cars/{{ $car->id }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ $car->name }}">

            <input type="text" name="founded" value="{{ $car->founded }}">

            <input type="text" name="description" value="{{ $car->description }}">

            <button type="submit">
                Submit
            </button>
        </form>
    </div>

@endsection