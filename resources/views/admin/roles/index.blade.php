@extends('layouts.main')

@section('title', 'Popis svih uloga')


@section('content')
    
<div class="card">
    <div class="card-header">
        Dobrodosli <b>{{ Auth::user()->firstname }} {{ Auth::user()->lastname}}</b>, na Algebra Cook administracijsko sucelje
    </div>

    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Permissions</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ implode(', ', $role->permissions()->pluck('name')->toArray()) }}</td>
                        <td>
                            <a href="{{ route('roles.edit', ['role' => $role->id]) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('roles.delete', ['role' => $role->id]) }}" class="btn btn-warning">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        <a href="{{ route('roles.create') }}" class="btn btn-success"><b>Add new role</b></a>
    </div>

</div>

@endsection