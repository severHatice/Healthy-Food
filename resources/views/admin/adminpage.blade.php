@extends('admin.admin-layout')

@section('content')
{{-- <x-admin.dashboard-cards></x-admin.dashboard-cards> --}}

<div class="dashboard-cards-container">
    <div class="adminpage-cards card-users" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Users</h5>
          <a href="{{ route('users')}}" class="btn">View</a>
        </div>
      </div>
      <div class="adminpage-cards card-recipe" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Recipes</h5>
          <a href="#" class="btn ">View</a>
        </div>
      </div>
      <div class="adminpage-cards card-review" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Reviews</h5>
          <a href="#" class="btn">View</a>
        </div>
      </div>
</div>

@endsection