@extends('layouts.main')

@section('title', 'Kreiranje korisnika')
    
@section('content')
    
    <p>
        <a href="{{ route('dashboard')}}"><<< Natrag</a>
    </p>
    <hr>

    <p>
        <form action="{{ route('user-create-new') }}" method="post">
            @csrf

            <div class="from-group col-md-4">
                <label>Ime</label>
                <input type="text" name="firstname" class="form-control">
            </div>

            <div class="from-group col-md-4">
                <label>Prezime</label>
                <input type="text" name="lastname" class="form-control">
            </div>

            <div class="from-group col-md-4">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="from-group col-md-4">
                <label>Korisničko ime</label>
                <input type="text" class="form-control" name="username" value="">
            </div>

            <div class="from-group col-md-4">
                <label>Lozinka</label>
                <input type="password" class="form-control" name="password"><br>

            <div class="from-group col-md-4">
                @foreach ($roles as $role)
                
                    <div class="form-check">
                        <input type="checkbox" name="roles[]" value="{{ $role->id }}">
                        <label>{{ $role->name }}</label>
                    </div>

                @endforeach
            </div>

            <div class="form-group col-md-4">
                <input type="submit" class="btn btn-success" value="Kreiraj">
            </div>
        </form>
    </p>

@endsection
