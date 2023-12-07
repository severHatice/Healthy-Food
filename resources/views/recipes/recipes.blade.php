@foreach($recipes as $recipe)
    <x-card-recipe :recipe="$recipe"></x-card-recipe>
@endforeach
