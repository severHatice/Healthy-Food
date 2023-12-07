@props(['recipe'])

<section id="card_recipe" class="card_recipe">
    <div class="container">
        <div class="row">
            <div class="card_recipe_content text-center  wow fadeIn" data-wow-duration="5s">
                <div class="col-md-12">
                    <div class="head_title text-center">
                        <h4>Delightful</h4>
                        <h3>Experience</h3>
                    </div>

                    <div class="main_card_recipe_content">                     
                        <div class="col-md-3 col-sm-4 col-xs-6 single_card_recipe_text">
                            <img src="{{ asset('storage/' . json_decode($recipe->images)[0]) }}" alt="{{ $recipe->title }}">

                            <div class="card_recipe_images_overlay text-center">
                                <h6>{{ $recipe->title }}</h6>
                                <h6 class="card_recipe_text">{{ $recipe->total_calories }} calories</h6>
                                {{-- todo: we have to show to hour and minute 02:22:00--}}
                                <p class="card_recipe_text">{{ $recipe->total_time }} minutes</p>
                                <p class="card_recipe_text">{{ $recipe->category }}</p>
                                <button class="btn">Click here</button>
                            </div>								
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>