@props(['recipe'])

            <div class="col-lg-4 col-md-6 special-grid drinks">
                <div class="gallery-single fix">
                    <img class="img-fluid" src="{{ asset('storage/' . json_decode($recipe->images)[0]) }}" alt="{{ $recipe->title }}">
                    <div class="why-text">
                        <h6>{{ $recipe->title }}</h6>
                        <h6>{{ $recipe->total_calories }} calories</h6>
                        <p class="card_recipe_text">{{ $recipe->total_time }} minutes</p>
                        <p class="card_recipe_text">{{ $recipe->category }}</p>
                        <p>{{ $recipe->is_liked }} likes</p>
                        <p>Average Rating: {{ round($recipe->averageRating(), 1) }}/5</p>
                        <a href="{{ route('recipe-detail.show', ['recipe' => $recipe->id, 'ref' => 'homepage']) }}">Detay</a>
                    </div>
                </div>
            </div>
