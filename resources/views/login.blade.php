{{-- 1. korak, odabir layouta--}}
@extends('layouts.main')

{{-- 2. korak--}}
@section('title', 'Prijava')


@section('content')
    
    <div class="row justify-content-md-center">
        <div class="col-md-4">
            
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="form-group"> 
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>  

                <div class="form-group">
                    <input type="submit" value="Prijavi se!" class="btn btn-success">
                </div>

            </form>

        </div>
    </div>

@endsection
