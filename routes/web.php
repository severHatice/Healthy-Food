<?php


use Database\Factories\RecipeFactory;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubscribesController;

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
// *******************************AUTH********************************8
Route::get('/register', [UserController::class, 'registerForm'])->name('registerForm');

Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/login', [UserController::class, 'login']);

Route::post('/login', [UserController::class, 'authenticate']);

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/admin/dashboard', function () {
    return view('admin.adminpage');
});
// *****************************************USER***************************************

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

// here, at the same time we send all recipes to this page
Route::get('/user/dashboard',[RecipeController::class,'userdashboard'])->name('userdashboard');

// *************************ABOUT PAGE***********************************

Route::get('/about',function(){
    return view('homepage');
});

// ****************************RECIPES PART******************************

Route::get('/create-recipe', [RecipeController::class, 'createRecipeForm'])->name('createRecipeForm');


// Route::post('/createRecipes',[RecipeFactory::class,'creat']);
Route::post('/create-recipes', [RecipeController::class, 'store'])->name('createRecipes');


Route::get('/contact',function(){
    return view('homepage');
});

// show message form
Route::get('/contact', [ContactController::class, 'showContactForm'])->name('showContactForm');

// end message
Route::post('/contact', [ContactController::class, 'submitContactForm'])->name('contact');

// see detail of recipe
Route::get('/recipes/{recipe}', [RecipeController::class, 'showRecipe'])->name('recipe-detail.show');
// update recipe
// Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'editRecipe'])->name('recipe-card.edit');
// delete recipe
// Route::delete('/recipes/{recipe}', [RecipeController::class, 'deleteRecipe'])->name('recipe.destroy');

//******************* */ likes for recettes *************************************8
Route::post('/recipes/{recipe}/like', [RecipeController::class, 'like'])->name('recipes.like');
Route::post('/recipes/{recipe}/unlike', [RecipeController::class, 'unlike'])->name('recipes.unlike');
// *************************8rating part********************************************
Route::post('/recipes/{recipe}/rate', [RecipeController::class, 'rate'])->name('recipes.rate');
// recipe edit part
Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'editRecipe'])->name('recipe.edit');
Route::put('/recipes/{recipe}', [RecipeController::class, 'updateRecipe'])->name('recipe.update');
// recipe delete part
Route::delete('/recipes/{recipe}', [RecipeController::class, 'deleteRecipe'])->name('recipe.delete');

//show subscribes form
Route::get('/footer', [SubscribesController::class, 'showSubscribes'])->name('showSubscribes');

//Subscribe
Route::post('/footer', [SubscribesController::class, 'subscribes'])->name('footer');



