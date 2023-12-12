   {{-- <section id="recipes" class="db-recipes">
        <a name="recipes"></a>
        <x-recipes.card-homepage-container :recipes="$recipes">
            @include('partials._search')
            <x-slot name="slot">   
            @foreach ($recipes as $recipe)
                <x-recipes.card-homepage :recipe="$recipe" class="db-card"></x-recipes.card-homepage>
            @endforeach
        </x-slot>
        </x-recipes.card-homepage-container>
    </section> --}}

   {{-- unfortunately i had problem undefined variable $slot and i had to take container part here --}}

   <section id="recipes" class="db-recipes">
    <div class="menu-box">
        <div class="recip-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>Special Menu of Our Users</h2>
                        <p class="heading-text">Delightful recipes added by our users</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="All">All</button>
                            <button data-filter="Breakfast">Breakfast</button>
                            <button data-filter="Lunch">Lunch</button>
                            <button data-filter="Dinner">Dinner</button>
                            <button data-filter="Dessert">Dessert</button>
                        </div>
                        {{-- @include('partials._search') --}}
                    </div>
                </div>
            </div>
            @include('partials._search')
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
        </div>
    </div>
        <div class="users-pagination">
            {{ $recipes->links() }}
        </div>
</section>

<script>
 // dublicate the container of recipes ---the buttons of category???
function filterRecipes(category) {
 axios.get('/recipes/category/' + category)
     .then(function (response) {
         const specialList = document.querySelector('.special-list');
         if (specialList) {

             while (specialList.firstChild) {
                 specialList.removeChild(specialList.firstChild);
             }

             const tempDiv = document.createElement('div');
             tempDiv.innerHTML = response.data;
             const newContent = tempDiv.querySelector('.menu-box') || tempDiv;

             specialList.appendChild(newContent);
         }
     })
     .catch(function (error) {
         console.error('Error:', error);
     });
}


document.addEventListener('DOMContentLoaded', function() {
 document.querySelectorAll('.filter-button-group button').forEach(function(button) {
     button.addEventListener('click', function() {
         document.querySelectorAll('.filter-button-group button').forEach(btn => btn.classList.remove('active'));
         this.classList.add('active');
         let category = button.getAttribute('data-filter');
         filterRecipes(category);
     });
 });
});

</script>
