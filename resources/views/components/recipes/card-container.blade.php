<div {{$attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6'])}}>
    {{$slot}}
    {{-- The $slot variable is the placeholder for all content to be inserted --}}
</div>

<section id="card_recipe" class="card_recipe">
    <div class="container">
        <div class="row">
            <div class="card_recipe_content text-center  wow fadeIn" data-wow-duration="5s">
                <div class="col-md-12">
                    <div class="head_title text-center">
                        <h4>Delightful</h4>
                        <h3>Experience</h3>
                    </div>
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
</section>
