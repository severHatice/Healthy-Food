@extends('users.user-dashboard.user-layout')

@section('content')
    <div class="user-dashboard-container">
        <section id="recipes">
            <a name="recipes"></a>
            @include('recipes.recipes')
        </section>
    </div>
@endsection
