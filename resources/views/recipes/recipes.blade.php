{{-- <x-recipes.card-container>
    <div class="slick1">
    @foreach($recipes as $recipe)
        <x-recipes.card-recipe :recipe="$recipe"></x-recipes.card-recipe>
    @endforeach
</div>
</x-recipes.card-container> --}}
<div class="recipe-card-container">
<p class="recipe-card-title">My Recipes</p>
<div class="swiper">
    <div class="swiper-wrapper">
        @foreach($recipes as $recipe)
            <div class="swiper-slide">
                <x-recipes.card-recipe :recipe="$recipe"></x-recipes.card-recipe>
            </div>
        @endforeach 
      
    </div>

    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

</div>

  

<div class="users-pagination">
    {{ $recipes->links() }}
</div> 