<?php

namespace App\Http\Controllers;

use id;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentsController extends Controller
{
 

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'recipe_id' => 'required|exists:recipes,id',
            'comment' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        // Création du commentaire
        $comment = new Comment();
        $comment->user_id = auth()->user()->id; // ou utilisez l'utilisateur actuellement authentifié
        $comment->recipe_id = $request->recipe_id;
        $comment->content = $request->comment;
        $comment->parent_id = $request->parent_id;
        $comment->save();

        // Redirection vers la page de détails de la recette avec le nouveau commentaire
        return redirect()->route('showDetails', ['recipeId' => $request->recipe_id])
                         ->with('success', 'Commentaire ajouté avec succès!');
    }
    
}


