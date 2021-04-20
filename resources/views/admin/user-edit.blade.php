@extends('layouts.main')

@section('title', 'Ažuriranje korisnika')
    
@section('content')
    
    <p>
        <a href="{{ route('dashboard')}}"><<< Natrag</a>
    </p>
    <hr>

    <p>
        <form action="{{ route('user-update', ['user' => $user->id]) }}" method="post">
            @csrf

            <div class="from-group col-md-4">
                <label>Ime</label>
                <input type="text" name="firstname" class="form-control" value="{{ $user->firstname }}">
            </div>

            <div class="from-group col-md-4">
                <label>Prezime</label>
                <input type="text" name="lastname" class="form-control" value="{{ $user->lastname }}">
            </div>

            <div class="from-group col-md-4">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>


            <div class="from-group col-md-4">
                @foreach ($roles as $role)

                
                    <div class="form-check">
                        <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                            @if ($user->roles->pluck('id')->contains($role->id))
                                checked
                            @endif                    
                            @if ($user->roles->pluck('name')->contains('admin'))
                                @if ($role->name == 'admin')
                                    hidden
                                @endif
                        @endif
                        >
                        <label>{{ $role->name }}</label>
                    </div>

                @endforeach
            </div>

            <div class="form-group col-md-4">
                <input type="submit" class="btn btn-success" value="Ažuriraj">
            </div>

        </form>
    </p>

@endsection
