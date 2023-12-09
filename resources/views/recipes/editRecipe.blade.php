@extends('users.user-dashboard.user-layout')

@section('content')
    <div class="recipe-edit-container">
        <h1>Edit Recipe</h1>
        <form action="{{ route('recipe.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $recipe->title }}" required>
            </div>
            @php
                $descriptionParts = explode("\n\nIngredients:\n", $recipe->description);
                $mainDescription = $descriptionParts[0];
                $ingredientsList = isset($descriptionParts[1]) ? explode("\n", $descriptionParts[1]) : [];
            @endphp
            <div class="mb-3 col-12" id="ingredients-container">
                @foreach ($ingredientsList as $ingredient)
                    <input type="text" name="ingredients[]" value="{{ $ingredient }}">
                @endforeach
            </div>
            <button type="button" onclick="addIngredient()" class="btn">Add Ingredient</button>


            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $mainDescription }}</textarea>
            </div>

            <div class="form-group">
                <label for="total_calories">Total Calories</label>
                <input type="number" class="form-control" id="total_calories" name="total_calories"
                    value="{{ $recipe->total_calories }}" required>
            </div>

            <div class="mb-3">
                <label for="total-time" class="form-label">Total Time</label>
                <input type="time" class="form-control" id="Total-time" value="{{ $recipe->total_time }}"
                    name="total_time" placeholder="Total Time">
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category">
                    <option value="Breakfast" {{ $recipe->category == 'Breakfast' ? 'selected' : '' }}>Breakfast</option>
                    <option value="Lunch" {{ $recipe->category == 'Lunch' ? 'selected' : '' }}>Lunch</option>
                    <option value="Dinner" {{ $recipe->category == 'Dinner' ? 'selected' : '' }}>Dinner</option>
                    <option value="Dessert" {{ $recipe->category == 'Dessert' ? 'selected' : '' }}>Dessert</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Recipe Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @if ($recipe->images)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . json_decode($recipe->images)[0]) }}" alt="{{ $recipe->title }}"
                            width="200px">
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update Recipe</button>
        </form>
    </div>
@endsection
