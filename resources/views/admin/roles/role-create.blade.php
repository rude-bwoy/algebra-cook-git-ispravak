@extends('layouts.main')

@section('title', 'Create new role')

@section('content')

    <p>
        <a href="{{ route('roles.index') }}"><<< Natrag</a>
    </p>

    <p>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </p>

    <div class="row justify-content-md-center">
        <div class="col-md-6">

            <form method="post" action="{{ route('roles.store') }}">
                @csrf

                <div class="form-group">
                    <label>Role name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Permissions</label>
                    <hr>

                    <div class="row">

                        <div class="col-md-4">
                            <label>Roles permissions</label>
                            @foreach ($permissions['roles'] as $permission)
                                <div class="form-check">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                    <label>{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-md-4">
                            <label>Users permissions</label>
                            @foreach ($permissions['users'] as $permission)
                                <div class="form-check">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                    <label>{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-md-4">
                            <label>Recipes permissions</label>
                            @foreach ($permissions['recipes'] as $permission)
                                <div class="form-check">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                    <label>{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div>
                        <input type="submit" class="btn btn-success" value="Spremi">
                    </div>
                </div>

            </form>

        </div>
    </div>
    
@endsection
