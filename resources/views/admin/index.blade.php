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
                <th scope="col">Email</th>
                <th scope="col">Roles</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($all_users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->firstname . ' ' . $user->lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ implode(', ', $user->roles()->pluck('name')->toArray()) }}</td>
                        <td>
                            <a href="{{ route('user-edit', ['user' => $user->id]) }}" class="btn btn-primary">Edit</a>
                            <a href="
                            {{ 
                            route(
                                'user-delete',
                                ['user' => $user->id]) 
                            }}
                            " class="btn btn-warning">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        <a href="{{ route('user-create') }}" class="btn btn-success"><b>Kreiraj novog korisnika</b></a>
    </div>

</div>