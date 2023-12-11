@props(['recipe'])

<div class="col-md-3 col-sm-4 col-xs-6 single_card_recipe_text">
    @if ($recipe->images && is_array(json_decode($recipe->images)))

        @if (count(json_decode($recipe->images)) > 0)

    <img class="card-image" src="{{ asset('storage/' . json_decode($recipe->images)[0]) }}" alt="{{ $recipe->title }}">
   
    @else
    <p>Il n'y a pas d'images disponibles pour cette recette.</p>
    @endif
    @else
    <p>Il n'y a pas d'images disponibles pour cette recette.</p>
    @endif
    <div class="card_recipe_images_overlay text-center">
        <h6>{{ $recipe->title }}</h6>
        <h6 class="card_recipe_text">{{ $recipe->total_calories }} calories</h6>
        {{-- todo: we have to show to hour and minute 02:22:00 --}}
        <p class="card_recipe_text">{{ $recipe->total_time }} minutes</p>
        <p class="card_recipe_text">{{ $recipe->category }}</p>
        <button class="btn">Click here</button>
    </div>

    <!-- form to create comment-->

    <!-- card-recipe.blade.php -->


<div class="col-md-3 col-sm-4 col-xs-6 single_card_recipe_text">
    <!-- ... (code de la carte recipe) ... -->

</div>

</div>
