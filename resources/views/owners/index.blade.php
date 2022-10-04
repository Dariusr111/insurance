
{{--   http://localhost/insurance/public/owners   --}}

@extends('layouts.main')
@section('content')
    <a class="btn btn-primary float-end me-3" href="{{ route('owners.create') }}">Pridėti sąvininką</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>Markė</th>
            <th>Modelis</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($owners as $owner)
            <tr>
                <td>{{ $owner->id }}</td>
                <td>{{ $owner->name }}</td>
                <td>{{ $owner->surname }}</td>
                <td>
                    @foreach($owner->car as $car)
                        {{ $car->brand }}  <br>@endforeach
                </td>
                <td>
                    @foreach($owner->car as $car)
                        {{ $car->model }}  <br>@endforeach
                </td>

                <td><a class="btn btn-success float-end" href="{{ route('owners.edit', $owner->id) }}">Koreguoti</a> </td>
                <td style="width:  10%">
                    <form action="{{ route('owners.destroy', $owner->id) }}" method="post">
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

