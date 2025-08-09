@extends('layouts.admin')

@section('title', 'Clubs')

@section('content')
    <h1>Clubs</h1>
    <a href="#" class="btn btn-primary mb-3">Create Club</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Owner</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- Club data will be looped here --}}
        </tbody>
    </table>
@endsection
