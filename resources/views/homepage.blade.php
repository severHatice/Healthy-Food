@extends('layout')

@section('content')

@include('components.slider')


<section id="contact">
    <a name="contact"></a>
   @include('contact')
</section>


<section id="about">
    <a name="about"></a>
   @include('homepage.about')
</section>




@endsection
