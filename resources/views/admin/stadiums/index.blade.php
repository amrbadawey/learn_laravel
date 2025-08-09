@extends('layouts.admin')

@section('title', 'Stadiums')

@section('content')
    <h1>Stadiums</h1>
    <a href="#" class="btn btn-primary mb-3">Create Stadium</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Club</th>
                <th>Sport Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- Stadium data will be looped here --}}
        </tbody>
    </table>
@endsection
