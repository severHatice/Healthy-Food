<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Recipe;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Création d'un utilisateur spécifique
        // $specificUser = User::create([
        //     'username' => 'healty food',
        //     'email' => 'healty.food@gmail.com',
        //     'password' => bcrypt('password'),
        //     'admin' => 0,
        //     'daily_calorie_target' => 2000,
        // ]);

        // Génération de 10 utilisateurs aléatoires
        // $randomUsers = User::factory(20)->create();
        // User::factory(20)->create();
        $this->call(RecipeSeeder::class);


        // Création d'une collection avec l'utilisateur spécifique
        // $users = collect([$specificUser])->merge($randomUsers);

        // Génération de 10 recettes associées à des utilisateurs aléatoires
        // $recipes = Recipe::factory(10)->create([
        //     'user_id' => $users->random()->id,
        // ]);

        // Génération de 10 commentaires associés à des utilisateurs et des recettes aléatoires
        // Comment::factory(10)->create([
        //     'user_id' => $users->random()->id,
        //     'recipe_id' => $recipes->random()->id,
        // ]);
    }
}
