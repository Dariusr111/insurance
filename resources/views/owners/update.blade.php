
@extends('layouts.main')
@section('content')

    <form action="{{ route('owners.update', $owner->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Vardas:</label>
            <input class="form-control" type="text" name="name" value="{{ $owner->name }}">
        </div>
        <div  class="mb-3">
            <label class="form-label">Pavardė:</label>
            <input class="form-control" type="text" name="surname"  value="{{ $owner->surname }}">
        </div>
        <div  class="mb-3">
            <label class="form-label">El.paštas:</label>
            <input class="form-control" type="text" name="email"  value="{{ $owner->email }}">
        </div>

        <button class="btn btn-primary">Atnaujinti</button>
    </form>
@endsection
