@extends('layouts.main')

@section('title', 'Delete role')

@section('content')

    <p>
        <a href="{{ route('roles.index') }}"><<< Back</a>
    </p>

    <p>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </p>

    <p>
        <form action="{{ route('roles.destroy', ['role' => $role->id ]) }}" method="POST">
            @method("DELETE")
            @csrf
            
            <label>Are you sure you want to remove the role?</label>
            <div class="row">

                <div class="col-md-6">
                    <input type="submit" class="btn btn-danger" value="YES">
                </div>

                <div class="col-md-6">
                    <a href="{{ route('roles.index') }}" class="btn btn-warning">NO</a>
                </div>

            </div>
            
        </form>
    </p>

@endsection