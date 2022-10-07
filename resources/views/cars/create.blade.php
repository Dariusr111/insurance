@extends('layouts.main')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif

<form action="{{ route('cars.store') }}" method="post">
    @csrf
    <div  class="mb-3">
        <label class="form-label">Reg.nr.:</label>
        <input class="form-control" type="text" name="reg_no">
    </div>
    <div class="mb-3">
        <label class="form-label">Markė:</label>
        <input class="form-control" type="text" name="brand">
    </div>
    <div  class="mb-3">
        <label class="form-label">Modelis:</label>
        <input class="form-control" type="text" name="model">
    </div>
{{--    <div  class="mb-3">--}}
{{--        <label class="form-label">Savininko ID:</label>--}}
{{--        <input class="form-control" type="text" name="owner_id">--}}
{{--    </div>--}}

    <div  class="mb-3">
           <label class="form-label">Sąvininkas:</label>
           <select name="owner_id" class="form-control" required>
               <option value="" disabled selected>Pasirinkite</option>
               @foreach($owners as $owner)
               <option value="{{ $owner->id }}">{{ $owner->name }} {{ $owner->surname }}</option>
               @endforeach
           </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Automobilio nuotrauka:</label>
        <input type="file" class="form-control" name="image">
    </div>

    <button class="btn btn-primary">Pridėti</button>
</form>
@endsection






