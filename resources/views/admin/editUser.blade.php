@extends('admin.admin-layout') 

@section('content')
<div class="edituser-container">
    <h2 class="edit-uder-title">Edit User</h2>

    <form action="{{ route('edit', $user->id) }}" method="POST">
        @csrf
        @method('PUT') 

        <div class="form-group">
            <label for="username" class="edit-username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        {{-- <div class="form-group">
            <label for="daily_calorie_target">Daily Calorie Target</label>
            <input type="number" class="form-control" id="daily_calorie_target" name="daily_calorie_target" value="{{ $user->daily_calorie_target }}">
        </div> --}}

        <button id="edit-uder-btn" type="submit" class="btn-btn">Update</button>
    </form>
</div>
@endsection
