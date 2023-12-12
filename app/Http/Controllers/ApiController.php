<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getEdamamRecipes(Request $request)
    {
        $request->validate([
            'query' => 'required|max:255',
            // Other validation rules as needed
        ]);

        $response = Http::withHeaders([
            'app_id' => config('edamam.app_id'),
            'app_key' => config('edamam.app_key'),
        ])->get("https://api.edamam.com/api/recipes/v2", [
            'type' => 'public',
            'q' => $request->input('query'),
            // Add other parameters as needed
        ]);

        $recipes = $response->json();

        // Check if the 'results' key exists in the response
        $recipesData = isset($recipes['results']) ? $recipes['results'] : [];

        return view('recipes', [
            'recipes' => $recipesData
        ]);
    }
}
