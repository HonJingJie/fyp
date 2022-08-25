@extends('layouts.app')

@section('content')
    <div>
        <div>
            <h1>
                Create car
            </h1>
        </div>
    </div>

    <div>
        <form action="/cars" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Brand name...">

            <input type="text" name="founded" placeholder="Founded...">

            <input type="text" name="description" placeholder="Description...">

            <button type="submit">
                Submit
            </button>
        </form>
    </div>

@endsection