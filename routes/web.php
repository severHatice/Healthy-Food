<?php


use Database\Factories\RecipeFactory;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CaloryController;
use App\Http\Controllers\RecipeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|//wassim
*/

Route::get('/', function () {
    return view('homepage');
});
Route::get('/register', [UserController::class, 'registerForm'])->name('registerForm');

Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/login', [UserController::class, 'login']);

Route::post('/login', [UserController::class, 'authenticate']);

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/admin/dashboard', function () {
    return view('admin.adminpage');
});

// get all users as admin
Route::get('/users', [UserController::class, 'index'])->name('users');

// make admin the user 
Route::post('/users/{id}/update-admin', [UserController::class, 'updateAdminStatus'])->name('users.update-admin');
// user edit
Route::get('user/{id}/edit',[UserController::class,'editUserForm'])->name('editUserForm');
// user edit
Route::put('/user/{user}/edit',[UserController::class,'editUser'])->name('edit');

// delete user
Route::delete('user/{id}/delete',[UserController::class,'deleteUserForm'])->name('delete');

Route::get('/user/dashboard',[RecipeController::class,'userdashboard']);

Route::get('/about',function(){
    return view('homepage');
});

Route::get('/create-recipe', [RecipeController::class, 'createRecipeForm'])->name('createRecipeForm');


// Route::post('/createRecipes',[RecipeFactory::class,'creat']);
Route::post('/create-recipes', [RecipeController::class, 'store'])->name('createRecipes');


Route::get('/contact',function(){
    return view('homepage');
});

Route::get('/recipes',[ApiController::class,'getSpoonacularRecipes']);

// routes/web.php

// Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
// Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');

Route::get('/users/recipes',[RecipeController::class, 'showRecipesCards'])->name('recipes');

Route::post('/calorieTracker', [CaloryController::class, 'addFoodItem']);

Route::get('/calorieTracker', [CaloryController::class, 'getDailyCalories']);