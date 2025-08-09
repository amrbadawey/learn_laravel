@extends('layouts.admin')

@section('title', 'Reservations')

@section('content')
    <h1>Reservations</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Stadium</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- Reservation data will be looped here --}}
        </tbody>
    </table>
@endsection
