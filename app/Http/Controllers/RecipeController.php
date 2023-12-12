<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Recipe;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class RecipeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('comment');
    }


    public function createRecipeForm()
    {
        return view('recipes.createRecipes');
    }


    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'description' => 'required|string',
            'total_calories' => 'required|numeric',
            'total_time' => 'required',
            'ingredients' => 'required|array',
            'ingredients.*.name' => 'required|string',
            'category' => 'required|string|in:Breakfast,Lunch,Desserts,Dinner',
        ]);

        $formFields['user_id'] = Auth::id();

        // Concatenate the ingredients
        $ingredientsDescription = $formFields['description'] . "\n\nIngredients:\n";
        foreach ($formFields['ingredients'] as $ingredient) {
            $ingredientsDescription .= $ingredient['name'] . "\n";
        }
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipe_images', 'public');
            $formFields['images'] = json_encode([$imagePath]);
        } else {
            $formFields['images'] = json_encode([]);
        }

        $recipe = new Recipe();
        $recipe->fill($formFields);
        $recipe->description = $ingredientsDescription;
        $recipe->save();

        return redirect('/user/dashboard')->with('message', 'Recipe created Successfully!');
    }

    public function userdashboard()
    {  
        $userId = Auth::id();
        $recipes = Recipe::where('user_id', $userId)->get();
        // dd($recipes);
        return view('users.user-dashboard.userpage',compact('recipes'));
    }
    // public function showRecipesCards(){
    //     $recipes=Recipe::all();
    //     return view('recipes.recipes',compact('recipes'));
    // }

    // Show a single recipe
    public function showRecipe(Recipe $recipe,Request $request)
    {
        $ref = $request->query('ref', 'default');//we added this one to oriante user to show recipe detail.if
        // he is in homepage he will see detail there. if he is in his own page,it vill show detail in his page
        $descriptionParts = explode("\n\nIngredients:\n", $recipe->description);
        $mainDescription = $descriptionParts[0];
        $ingredientsList = isset($descriptionParts[1]) ? explode("\n", $descriptionParts[1]) : [];
    
        return view('recipes.recipeDetail', compact('recipe', 'mainDescription', 'ingredientsList','ref'));
    }

// set likes for recettes
public function like(Recipe $recipe) {
    try {
        $recipe->increment('is_liked');
        $recipe->save();
        return response()->json(['status' => 'liked', 'likes' => $recipe->is_liked]);
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}

public function unlike(Recipe $recipe) {
    try {
        $recipe->decrement('is_liked');
        $recipe->save();
        return response()->json(['status' => 'unliked', 'likes' => $recipe->is_liked]);
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}
public function rate(Request $request, Recipe $recipe)
{
    $request->validate([
        'rating' => 'required|integer|min:1|max:5', 
    ]);

    $userId = auth()->id();
    $ratingValue = $request->input('rating');

    // Check if the user has already rated this recipe
    $existingRating = Rating::where('recipe_id', $recipe->id)
                            ->where('user_id', $userId)
                            ->first();

    if ($existingRating) {
        // If the user has already rated, update the existing rating
        $existingRating->update(['rating' => $ratingValue]);
        $message = 'Rating updated successfully!';
    } else {
        // If the user has not rated yet, create a new rating
        $recipe->ratings()->create([
            'user_id' => $userId,
            'rating' => $ratingValue,
        ]);
        // TODO: it doesnt show messages.
        $message = 'Thank you for your rating!';
    }

    if ($request->ajax()) {
        return response()->json(['message' => $message]);
    }

  // After updating/adding the rating
  $newAverageRating = floatval($recipe->averageRating());
    $ratingsCount = $recipe->ratings()->count();

// TODO: there is a problem the response is not dans un format attended ??  
    return response()->json([
        'message' => $message,
        'newAverageRating' => $newAverageRating,
        'ratingsCount' => $ratingsCount
    ]);
    
}

public function editRecipe(Recipe $recipe)
{
    return view('recipes.editRecipe', compact('recipe'));
}

public function updateRecipe(Request $request, Recipe $recipe)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required|string',
        'ingredients' => 'required|array',
        'total_calories' => 'required|numeric',
        'total_time' => 'required',
        'category' => 'required|string',
        'image' => 'image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $fullDescription = $validatedData['description'] . "\n\nIngredients:\n" . implode("\n", $validatedData['ingredients']);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('recipe_images', 'public');
        $recipe->images = json_encode([$imagePath]);
    }

    $recipe->update([
        'title' => $validatedData['title'],
        'description' => $fullDescription,
        'total_calories' => $validatedData['total_calories'],
        'total_time' => $validatedData['total_time'],
        'category' => $validatedData['category'],
    ]);

    return redirect()->route('recipe-detail.show', $recipe->id)->with('message', 'Recipe updated successfully!');
}



public function deleteRecipe(Recipe $recipe)
{
    $recipe->delete();
    return redirect()->route('userdashboard')->with('message', 'Recipe deleted successfully!');

}

public function homepage(Request $request) {
    $searchTerm = $request->input('searchform');
    $recipes = Recipe::search($searchTerm)
                     ->paginate(5);
    return view('homepage', compact('recipes')); 
}
// get recipes from categories
public function getRecipesByCategory($category)
{
    $recipes = Recipe::where('category', $category)->paginate(2);
    // ddd($recipes);//TODO:recipes come once as wished but buttons of category dublicated
    return view('recipes.recipeloop', compact('recipes'));
}

   //show detaille card with comments 
   public function showDetails($recipeId){
    $recipe = Recipe::findOrFail($recipeId);
    return view('comments.createComment', ['recipe' => $recipe]);
}

public function comment(recipe $recipe, Request $request): RedirectResponse
{
    $validated = $request->validate([
        'comment' => ['required', 'string', 'between:2,255'],
    ]);

    Comment::create([
        'content' => $validated['comment'],
        'recipe_id' => $recipe->id,
        'user_id' => Auth::id(),
    ]);

    return back()->withStatus('Commentaire publié !');
}
}
