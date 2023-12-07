@extends('layout')

@section('content')

<div class="register-main-container">
<div class="login_container" id="register-container">
    <h1>Register</h1>
    <form class="register-form" action="/register" method="POST">
        @csrf
        <div class="input-container">
            <input type="text" name="username" placeholder="Username" >
        </div>
        <div class="input-container">
            <input type="email" name="email" placeholder="Email">
        </div>
        <div class="input-container">
            <input type="password" name="password" placeholder="Password">
        </div>
        <div class="input-container">
            <select name="gender" class="gender">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="input-container">
            <input type="number" name="age" placeholder="Age" required>
        </div>
        <div class="input-container">
            <input type="number" name="weight" placeholder="Weight (kg)" step="any" required>
        </div>
        <div class="input-container">
            <input type="number" name="height" placeholder="Height (cm)" step="any" required>
        </div>
        <button type="submit" class="btn">Register</button>
    </form>
</div>
</div>

   <!-- SweetAlert2 here we used a library -->
   @component('components.error-popup')
   @endcomponent

   {{-- <x-card-recipe></x-card-recipe>   --}}
   
@endsection



