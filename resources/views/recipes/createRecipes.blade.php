@extends('users.user-dashboard.user-layout')

@section('content')
    <form action="{{ route('createRecipes') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1>Create your Recipe</h1>
        <div class="mb-3 col-12">

            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" value="{{ old('title') }}" name="title"
                placeholder="title">
        </div>
        <div class="mb-3">
            <input type="file" name="image">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" value="{{ old('description') }}" name="description"
                placeholder="description">
        </div>


        <div class="mb-3">
            <label for="total-calorie" class="form-label">Total Calorie</label>
            <input type="number" class="form-control" id="total-calorie" value="{{ old('total_calories') }}"
                name="total_calories" placeholder="Total Calorie">
        </div>
        <div class="mb-3">
            <label for="total-time" class="form-label">Total Time</label>
            <input type="time" class="form-control" id="Total-time" value="{{ old('total_time') }}" name="total_time"
                placeholder="Total Time">
        </div>
        <div class="mb-3 col-12" id="ingredients-container">
            <div class = "mb-6 ingredient-input">
                <label for="ingredients">Ingredient Name</label>
                <input class="mb-3 col-12 h-12" type="text" name="ingredients[][name]" >
            </div>
        </div>
        <button type="button" onclick="addIngredient()" class="btn">Add Ingredient</button>
        <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="category">
            <option selected>Category</option>
            <option value="Breakfast">Breakfast</option>
            <option value="Lunch">Lunch</option>
            <option value="Dessert">Desserts</option>
            <option value="Dinner">Dinner</option>
        </select>
        <button type="submit" class="btn btn-primary">Add Recipe</button>
    </form>
    <script>
        function addIngredient() {
            let container = document.getElementById('ingredients-container');
            let newIngredientIndex = container.getElementsByClassName('ingredient-input').length;

            let newIngredient = document.createElement('div');
            newIngredient.className = 'mb-3 col-12 ingredient-input';
            newIngredient.innerHTML = `
                <label for="ingredients[${newIngredientIndex}][name]">Ingredient Name</label>
                <input type="text" name="ingredients[${newIngredientIndex}][name]" class="form-control">
            `;

            container.appendChild(newIngredient);
        }
    </script>

    <!-- SweetAlert2 here we used a library -->
    @component('components.error-popup')
    @endcomponent
@endsection
