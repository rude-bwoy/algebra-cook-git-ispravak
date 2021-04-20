@extends('layouts.main')

@section('title', 'Dobrodosli - ' . Auth::user()->firstname . ' ' . Auth::user()->lastname)

@section('content')
    
    @can('manage-users', User::class)
        {{-- Ovaj korisnik ima ulogu cija permisija dozvoljava pregled korisnika--}}
        @include('admin.index')
    @else
        {{-- Korisnim nema ulogu koja smije pregledavati korisnike --}}
        @include('user.index')
    @endcan


@endsection