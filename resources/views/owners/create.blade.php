@extends('layouts.main')
@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
        </div>
    @endif

    <form action="{{ route('owners.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label class="form-label">Vardas:</label>
            <input class="form-control" type="text" name="name">
        </div>
        <div  class="mb-3">
            <label class="form-label">Pavardė:</label>
            <input class="form-control" type="text" name="surname">
        </div>
        <div  class="mb-3">
            <label class="form-label">El.paštas:</label>
            <input class="form-control" type="text" name="email">
        </div>

        <button class="btn btn-primary">Pridėti</button>
    </form>
@endsection
