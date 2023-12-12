@props(['recipe'])

<div class="col-md-3 col-sm-4 col-xs-6 single_card_recipe_text">
    @if ($recipe->images && is_array(json_decode($recipe->images)))

        @if (count(json_decode($recipe->images)) > 0)
            <img class="card-image" src="{{ asset('storage/' . json_decode($recipe->images)[0]) }}"
                alt="{{ $recipe->title }}">
        @else
            <p>Il n'y a pas d'images disponibles pour cette recette.</p>
        @endif
    @else
        <p>Il n'y a pas d'images disponibles pour cette recette.</p>
    @endif
    <div class="card_recipe_images_overlay text-center">
        <h6>{{ $recipe->title }}</h6>
        <h5 class="card_recipe_text">{{ $recipe->total_calories }} kcal</h5>
        {{-- todo: we have to show to hour and minute 02:22:00 --}}
        <p class="card_recipe_text">{{ $recipe->total_time }}min</p>
        <p class="card_recipe_text">{{ $recipe->category }}</p>
        <div class="like-rate">
            <span>{{ $recipe->is_liked }} likes</span>
            <span>Average Rating: {{ round($recipe->averageRating(), 1) }}/5</span>
        </div>
        <a id="card-recipe-btn" class="btn-btn"
            href="{{ route('recipe-detail.show', ['recipe' => $recipe->id, 'ref' => 'user-dashboard']) }}">View</a>
    </div>

    <!-- form to create comment-->

    <!-- card-recipe.blade.php -->


    <div class="col-md-3 col-sm-4 col-xs-6 single_card_recipe_text">
        <!-- ... (code de la carte recipe) ... -->

    </div>

</div>
