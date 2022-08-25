@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Cars
            </h1>
        </div>

        <div>
            <a href="cars/create">
                Add a new car &rarr;
            </a>
        </div>

        <div>
            @foreach ($cars as $car)
                <div>
                    <div>
                        <a href="cars/{{ $car->id }}/edit">
                            Edit &rarr;
                        </a>

                        <form action="/cars/{{ $car->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit">
                                Delete &rarr;
                            </button>
                        </form>
                    </div>
                    <span>
                        Founded: {{ $car->founded }}
                    </span>

                    <h2>
                        {{ $car->name }}
                    </h2>

                    <p>
                        {{ $car->description }}
                    </p>

                    <hr>
                </div>
            @endforeach
        </div>
    </div>
@endsection