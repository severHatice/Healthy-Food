@extends('layout')

@section('content')
<div class="login-main-container">
<div class="login_container">
    <form class="login-form" action="/login" method="POST">
        @csrf
        <h1>LOGIN </h1>
            <div class="input-box">
                <input type="email" name="email" id="email" placeholder="email">
                <i class='bx bxs-user' ></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" id="password" placeholder="Password">
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="rememberChekbox">
                <label><input type="checkbox">Remember me</label>
            </div>
            <div class="button">
            <input type="submit" value="Login" id="btn">
            </div>
            <div class="register-link">
            <p>Dont have an account? </p>
            <a href="users/register.php">Register here!</a>
            </div>
        </div> 
    </form>
</div>
 <!-- SweetAlert2 here we used a library -->
 @component('components.error-popup')
 @endcomponent
 
@endsection
