
{{--   http://localhost/insurance/public/cars   --}}

@extends('layouts.main')
@section('content')
<a class="btn btn-primary float-end me-3" href="{{ route('cars.create') }}">Pridėti modelį</a>

<table class="table">
    <thead>
    <tr>
        <th>Reg. nr.</th>
        <th>Markė</th>
        <th>Modelis</th>
        <th>Savininko ID</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($cars as $car)
    <tr>
        <td>{{ $car->reg_no }}</td>
        <td>{{ $car->brand }}</td>
        <td>{{ $car->model }}</td>
        <td>{{ $car->owner_id }}</td>
        <td><a class="btn btn-success float-end" href="{{ route('cars.edit', $car->id) }}">Koreguoti</a> </td>
        <td style="width:  10%">
            <form action="{{ route('cars.destroy', $car->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger float-end ms-3 me-2">Ištrinti</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection
