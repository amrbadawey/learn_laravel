@extends('layouts.admin')

@section('title', 'Create Club')

@section('content')
    <h1>Create Club</h1>
    <form action="#" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Club Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">Owner</label>
            <select class="form-select" id="user_id" name="user_id" required>
                {{-- User options will be populated here --}}
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
