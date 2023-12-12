<div class="row special-list">
    @foreach ($recipes as $recipe)
      <div class="  col-sm-10 special-grid drinks">
        {{-- <x-recipes.card-homepage :recipe="$recipe" class="db-card"></x-recipes.card-homepage> --}}
        <div class="gallery-single fix">
         <img class="img-fluid" src="{{ asset('storage/' . json_decode($recipe->images)[0]) }}" alt="{{ $recipe->title }}">
         <div class="why-text">
             <h6>{{ $recipe->title }}</h6>
             <p class="card_recipe_text">{{ $recipe->category }}</p>
             <h4>{{ $recipe->total_calories }} calories</h6>
             <p class="card_recipe_text">{{ $recipe->total_time }} minutes</p>
             <div class="rating-like-card-container">
                 <span>{{ $recipe->is_liked }} likes</span> - 
                 <span>Average Rating: {{ round($recipe->averageRating(), 1) }}/5</span>
             </div>
             <a id="recipes-homepage-btn" class="btn-btn" href="{{ route('recipe-detail.show', ['recipe' => $recipe->id, 'ref' => 'homepage']) }}">View</a>
         </div>
     </div>
      </div>
    @endforeach

</div>
<div class="users-pagination">
    {{ $recipes->links() }}
</div>
