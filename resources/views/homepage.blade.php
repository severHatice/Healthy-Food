@extends('layout')

@section('content')

@include('components.slider')

<section id="recipes" class="db-recipes">
    <a name="recipes"></a>
<div class="menu-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Special Menu</h2>
                    <p class="heading-text">Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <button class="active" data-filter="*">All</button>
                        <button data-filter=".drinks">Drinks</button>
                        <button data-filter=".lunch">Lunch</button>
                        <button data-filter=".dinner">Dinner</button>
                    </div>
                    @include('partials._search')
                </div>
            </div>
        </div>
        <div class="row special-list">
   @foreach($recipes as $recipe)
   {{-- <div class="db-recipes-container"> --}}
           <x-recipes.card-homepage :recipe="$recipe" class="db-card"></x-recipes.card-homepage>
       {{-- </div> --}}
       @endforeach
    </div>
</div>
</div>
</section>

<div class="users-pagination">
 {{-- <div class="visibility: collapse"> --}}
    {{ $recipes->links() }}
</div>
{{-- <section id="contact">
    <a name="contact"></a>
   @include('homepage.contact')
</section> --}}

<section id="caloriesTracker">
    <a name="caloriesTracker"></a>
    @include('components.calorieCalculator')
</section>

<section id="about">
    <a name="about"></a>
   @include('homepage.about')
</section>




@endsection
