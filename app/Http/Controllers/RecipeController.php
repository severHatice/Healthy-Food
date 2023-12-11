<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
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

    public function index()
    {
        // استرجاع جميع الوصفات وعرضها في الواجهة
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        // عرض النموذج لإنشاء وصفة جديدة
        return view('recipes.create');
    }

    public function store2(Request $request)
    {
        // حفظ الوصفة الجديدة في قاعدة البيانات
        Recipe::create($request->all());
        return redirect()->route('recipes.index');
    }

    public function edit(Recipe $recipe)
    {
        // عرض النموذج لتحرير وصفة موجودة
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        // تحديث الوصفة في قاعدة البيانات
        $recipe->update($request->all());
        return redirect()->route('recipes.index');
    }

    public function destroy(Recipe $recipe)
    {
        // حذف وصفة موجودة من قاعدة البيانات
        $recipe->delete();
        return redirect()->route('recipes.index');
    }

    public function userdashboard()
    {  
        $recipes=Recipe::paginate(4);
        // dd($recipes);
        return view('users.user-dashboard.userpage',compact('recipes'));
    }
    public function showRecipesCards(){
        $recipes=Recipe::all();
        return view('recipes.recipes',compact('recipes'));
    }

    //show detaille card with comments 
    public function showDetails($recipeId){
        $recipe = Recipe::findOrFail($recipeId);
        return view('comments.createComment', ['recipe' => $recipe]);
    }
}
