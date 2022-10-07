
@extends('layouts.main')
@section('content')

    <form action="{{ route('cars.update', $car->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Reg.nr:</label>
            <input class="form-control" type="text" name="reg_no" value="{{ $car->reg_no }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Marke:</label>
            <input class="form-control" type="text" name="brand" value="{{ $car->brand }}">
        </div>
        <div  class="mb-3">
            <label class="form-label">Modelis:</label>
            <input class="form-control" type="text" name="model"  value="{{ $car->model }}">
        </div>

{{--        <div  class="mb-3">--}}
{{--            <label class="form-label">Savininko ID:</label>--}}
{{--            <input class="form-control" type="text" name="owner_id"  value="{{ $car->owner_id }}">--}}
{{--        </div>--}}

        <div  class="mb-3">
            <label class="form-label">Sąvininkas:</label>
            <select name="owner_id" class="form-control" required>
                <option value="" disabled selected>Pasirinkite</option>
                @foreach($owners as $owner)
                <option @if($owner->id==$car->owner_id) selected @endif value="{{ $owner->id }}">{{ $owner->name }} {{ $owner->surname }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Automobilio nuotrauka:</label>
            <input type="file" class="form-control" name="image">
        </div>

        <button class="btn btn-primary">Atnaujinti</button>
    </form>
@endsection





