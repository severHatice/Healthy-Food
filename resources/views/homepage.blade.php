@extends('layout')

@section('content')
    @include('components.slider')

    @include('components.calorieCalculator')

    <section id="recipes">
        {{-- class="db-recipes" --}}
        <a name="recipes"></a>
        @include('recipes.recipes-homepage')
    </section>
    

<section id="about">
    <a name="about"></a>
    @include('homepage.about')
</section>

<section id="contact">
<a name="contact"></a>
@include('homepage.contact')
</section>

@endsection
