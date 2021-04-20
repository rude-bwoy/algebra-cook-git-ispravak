<div class="card">
    <div class="card-header">
        Dobrodosli {{ Auth::user()->firstname }} {{ Auth::user()->lastname}}, u nastavku se nalaze vasi recepti.
    </div>

    <div class="card-body">
        <h5 class="card-title">Osobni podatci:</h5>
        <p class="card-text">
            {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
        </p>
        <p class="card-text">
            Email: {{ Auth::user()->email }}
        </p>
        <hr>
        <a href="{{ route('recipe-create') }}" class="btn btn-primary">Dodaj novi recept</a>
    </div>
</div>