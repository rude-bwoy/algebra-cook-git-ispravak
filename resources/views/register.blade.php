@extends('layouts.main')

@section('title', 'Register')

@section('content')


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row justify-content-md-center">

        <div class="col-md-4">

            <form action="{{ route('register') }}" method="post">
                @csrf

                <div class="form-group">
                    <label>Ime</label>
                    <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">
                </div>
                <div class="form-group">
                    <label>Prezime</label>
                    <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="">
                </div>
                <div class="form-group">
                    <label>Korisnicko ime</label>
                    <input type="text" class="form-control" name="username" value="">
                </div>
                <div class="form-group">
                    <label>Lozinka</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Registriraj se">
                </div>

            </form>

        </div>
    </div>

@endsection