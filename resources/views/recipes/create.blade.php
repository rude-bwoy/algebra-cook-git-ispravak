@extends('layouts.main')

@section('title', 'Unos novog recepta')
    
@section('content')
    <p>
        <a href="{{ route('dashboard') }}"><<<<< Natrag</a>
    </p>
    <hr>

    <div class="row justify-content-md-center">
        <div class="col-md-6">
            
            <form action="" method="post">
                @csrf

                <div class="form-group">
                    <label>Naziv recepta</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label>Kratki opis</label>
                    <textarea name="short_description" cols="3" rows="3" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>Opis</label>
                    <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>Slika</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">
                    <label>Objavi</label>
                    <select name="public" class="form-control">
                        <option value="0">Ne</option>
                        <option value="1">Da</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" value="Spremi recept" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>


@endsection
