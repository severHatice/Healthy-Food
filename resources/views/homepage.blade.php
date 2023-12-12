@extends('layout')

@section('content')
    @include('components.slider')



    {{-- <section id="recipes"> --}}
        {{-- class="db-recipes" --}}
        <a name="recipes"></a>
        @include('partials.recipes')
    {{-- </section> --}}


    {{-- <section id="contact">
    <a name="contact"></a>
   @include('homepage.contact')
</section> --}}

     {{-- <section id="caloriesTracker">
    <a name="caloriesTracker"></a>
    @include('components.calorieCalculator')
</section>  --}}

    <section id="about">
        <a name="about"></a>
        @include('homepage.about')
    </section>
@endsection
