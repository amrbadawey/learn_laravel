@extends('layouts.admin')

@section('title', 'Edit Stadium')

@section('content')
    <h1>Edit Stadium</h1>
    <form action="#" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Stadium Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{-- Stadium name --}}" required>
        </div>
        <div class="mb-3">
            <label for="club_id" class="form-label">Club</label>
            <select class="form-select" id="club_id" name="club_id" required>
                {{-- Club options will be populated here --}}
            </select>
        </div>
        <div class="mb-3">
            <label for="sport_type_id" class="form-label">Sport Type</label>
            <select class="form-select" id="sport_type_id" name="sport_type_id" required>
                {{-- Sport type options will be populated here --}}
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
