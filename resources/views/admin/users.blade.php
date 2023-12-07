@extends('admin.admin-layout')

@section('content')
    <div class="container mt-4">
        <h2 class="user-management-title">User Management</h2>
        <div class="search-users">
            @include('partials._search')
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="users-table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>Daily Calorie Target</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->admin)
                                    Admin
                                @else
                                    <form action="{{ route('users.update-admin', $user->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="admin" value="1">
                                        <button type="submit" class="make-admin-btn"><span class="make-admin-span">Make
                                                Admin</span></button>
                                    </form>
                                @endif
                            </td>
                            <td>{{ $user->daily_calorie_target }}</td>

                            <td class="actions-user-btns">

                                <a href="{{ route('editUserForm', $user->id) }}" id="edit-user-btn">Edit</a>
                                <form action="{{ route('delete', $user->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="delete-user-btn"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="users-pagination">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
