@extends('layouts.main')

@section('title', 'Brisanje korisnika')


@section('content')
    
    <p>
        <form action="{{ route('user-destroy', ['user' => $user->id]) }}" method="post">
        @csrf
            <label>Jeste li sigurni da zelite ukloniti korisnika?</label>
            <div class="row">
                <div class="col-md-6">
                    <input type="submit" class="btn btn-danger" value="DA">
                </div>
                <div class="col-md-6">
                    <a href="{{ route('dashboard') }}" class="btn btn-warning">NE</a>
                </div>
            </div>
        </form>
    </p>

@endsection