
@extends('layouts.main')
@section('content')

    <form action="{{ route('cars.update', $car->id) }}" method="post">
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
        <div  class="mb-3">
            <label class="form-label">Savininko ID:</label>
            <input class="form-control" type="text" name="owner_id"  value="{{ $car->owner_id }}">
        </div>
        <button class="btn btn-primary">Atnaujinti</button>
    </form>
@endsection





