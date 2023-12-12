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
                @if($recipes->count() > 0)
                @foreach($recipes as $recipe)
                    <div class="swiper-slide">
                        <x-recipes.card-recipe :recipe="$recipe"></x-recipes.card-recipe>
                    </div>
                @endforeach 
                @else
                    <div class="no-recipes-message">
                        <p>There are no recipes to display.</p>
                    </div>
                @endif
            </div>

            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>


</div>

  
{{-- 
<div class="users-pagination">
    {{ $recipes->links() }}
</div>  --}}