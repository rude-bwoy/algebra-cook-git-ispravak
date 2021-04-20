@extends('layouts.main')

@section('title', 'Edit role')

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

    <div class="row justify-content-md-center">
        <div class="col-md-6">

            <form method="POST" action="{{ route('roles.update', ['role' => $role->id]) }}">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label>Role name</label>
                    <input type="text" name="name" class="form-control" value="{{ $role->name }}">
                </div>

                <div class="form-group">
                    <label>Permission list</label>
                    <hr>

                    <div class="row">

                        <div class="col-md-4">
                            <label>Roles premissions</label>
                            @foreach($permissions['roles'] as $permission)
                                <div class="form-check">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                        @if($role->permissions->pluck('id')->contains($permission->id))
                                            checked
                                        @endif
                                    >
                                    <label>{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-md-4">
                            <label>Users premissions</label>
                            @foreach($permissions['users'] as $permission)
                                <div class="form-check">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                        @if($role->permissions->pluck('id')->contains($permission->id))
                                            checked
                                        @endif
                                    >
                                    <label>{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-md-4">
                            <label>Recipes premissions</label>
                            @foreach($permissions['recipes'] as $permission)
                                <div class="form-check">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                        @if($role->permissions->pluck('id')->contains($permission->id))
                                            checked
                                        @endif
                                    >
                                    <label>{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>

                    </div>

                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Update role">
                </div>

            </form>

        </div>
    </div>

@endsection