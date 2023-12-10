@props(['recipe'])

            

            <div class="col-lg-4 col-md-6 special-grid drinks">
                <div class="gallery-single fix">
                    <img class="img-fluid" src="{{ asset('storage/' . json_decode($recipe->images)[0]) }}" alt="{{ $recipe->title }}">
                    <div class="why-text">
                        <h6>{{ $recipe->title }}</h6>
                        <h6>{{ $recipe->total_calories }} calories</h6>
                        <p class="card_recipe_text">{{ $recipe->total_time }} minutes</p>
                        <p class="card_recipe_text">{{ $recipe->category }}</p>
                        <button class="btn" onclick="window.location='{{ route('recipe-detail.show', $recipe) }}'">Click here</button>
                    </div>
                </div>
            </div>

