<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = [
            [
                'user_id' => 4, 
                'title' => 'Classic Pancakes',
                'images' => json_encode(['/images/pancakes.jpg']),
                'description' => "Indulge in the creamy delight of our Savory Spinach and Mushroom Risotto, a perfect blend of rich flavors and comforting textures. This dish starts with a base of Arborio rice, known for its ability to absorb flavors while maintaining a firm texture. We begin by sautéing finely chopped onions in a mix of butter and olive oil until they become translucent, setting the stage for a rich flavor profile.
                Next, we add fresh, sliced mushrooms, allowing them to cook down and release their earthy essence. The mushrooms are followed by a generous handful of spinach, which wilts beautifully into the mixture, adding a pop of color and a dose of healthy nutrients.\n\nIngredients:\n- Flour\n- Eggs\n- Milk\n- Sugar\n- Baking Powder",
                'total_calories' => 500,
                'total_time' => '00:30:00',
                'category' => 'Breakfast',
                'is_liked' => 10
            ],    
            [
                'user_id' => 5,
                'title' => 'Hearty Vegetable Soup',
                'images' => json_encode(['/images/vegetable_soup.jpg']),
                'description' => "Indulge in the creamy delight of our Savory Spinach and Mushroom Risotto, a perfect blend of rich flavors and comforting textures. This dish starts with a base of Arborio rice, known for its ability to absorb flavors while maintaining a firm texture. We begin by sautéing finely chopped onions in a mix of butter and olive oil until they become translucent, setting the stage for a rich flavor profile.

                Next, we add fresh, sliced mushrooms, allowing them to cook down and release their earthy essence. The mushrooms are followed by a generous handful of spinach, which wilts beautifully into the mixture, adding a pop of color and a dose of healthy nutrients..\n\nIngredients:\n- Carrots\n- Potatoes\n- Onions\n- Celery\n- Tomatoes\n- Green Beans\n- Vegetable Stock\n- Garlic\n- Olive Oil\n- Salt and Pepper\n- Parsley\n- Thyme\n- Bay Leaves\n- Peas\n- Corn",
                'total_calories' => 300,
                'total_time' => '01:00:00',
                'category' => 'Lunch',
                'is_liked' => 15
            ],
            
            [
                'user_id' => 6,
                'title' => 'Mediterranean Quinoa Salad',
                'images' => json_encode(['/images/quinoa_salad.jpg']),
                'description' => "Indulge in the creamy delight of our Savory Spinach and Mushroom Risotto, a perfect blend of rich flavors and comforting textures. This dish starts with a base of Arborio rice, known for its ability to absorb flavors while maintaining a firm texture. We begin by sautéing finely chopped onions in a mix of butter and olive oil until they become translucent, setting the stage for a rich flavor profile.

                Next, we add fresh, sliced mushrooms, allowing them to cook down and release their earthy essence. The mushrooms are followed by a generous handful of spinach, which wilts beautifully into the mixture, adding a pop of color and a dose of healthy nutrients..\n\nIngredients:\n- Quinoa\n- Cherry Tomatoes\n- Cucumber\n- Red Onion\n- Feta Cheese\n- Olives\n- Olive Oil\n- Lemon Juice\n- Salt\n- Black Pepper\n- Parsley\n- Mint\n- Red Bell Pepper\n- Garlic\n- Chickpeas",
                'total_calories' => 350,
                'total_time' => '00:25:00',
                'category' => 'Lunch',
                'is_liked' => 20
            ],

            [
                'user_id' => 7,
                'title' => 'Spicy Chicken Curry',
                'images' => json_encode(['/images/chicken_curry.jpg']),
                'description' => "Indulge in the creamy delight of our Savory Spinach and Mushroom Risotto, a perfect blend of rich flavors and comforting textures. This dish starts with a base of Arborio rice, known for its ability to absorb flavors while maintaining a firm texture. We begin by sautéing finely chopped onions in a mix of butter and olive oil until they become translucent, setting the stage for a rich flavor profile.

                Next, we add fresh, sliced mushrooms, allowing them to cook down and release their earthy essence. The mushrooms are followed by a generous handful of spinach, which wilts beautifully into the mixture, adding a pop of color and a dose of healthy nutrients..\n\nIngredients:\n- Chicken Breast\n- Coconut Milk\n- Curry Powder\n- Onions\n- Tomatoes\n- Garlic\n- Ginger\n- Chili Peppers\n- Cumin Seeds\n- Turmeric\n- Coriander\n- Cinnamon\n- Cardamom\n- Cloves\n- Bay Leaves\n- Cilantro",
                'total_calories' => 600,
                'total_time' => '01:10:00',
                'category' => 'Dinner',
                'is_liked' => 25
            ],
 
            [
                'user_id' => 8,
                'title' => 'Chocolate Chip Cookies',
                'images' => json_encode(['/images/choc_chip_cookies.jpg']),
                'description' => "Indulge in the creamy delight of our Savory Spinach and Mushroom Risotto, a perfect blend of rich flavors and comforting textures. This dish starts with a base of Arborio rice, known for its ability to absorb flavors while maintaining a firm texture. We begin by sautéing finely chopped onions in a mix of butter and olive oil until they become translucent, setting the stage for a rich flavor profile.

                Next, we add fresh, sliced mushrooms, allowing them to cook down and release their earthy essence. The mushrooms are followed by a generous handful of spinach, which wilts beautifully into the mixture, adding a pop of color and a dose of healthy nutrients..\n\nIngredients:\n- Flour\n- Baking Soda\n- Salt\n- Butter\n- Sugar\n- Brown Sugar\n- Vanilla Extract\n- Eggs\n- Chocolate Chips\n- Walnuts\n- Cocoa Powder\n- Oats\n- Cinnamon\n- Nutmeg\n- Milk",
                'total_calories' => 480,
                'total_time' => '00:45:00',
                'category' => 'Dessert',
                'is_liked' => 30
            ],
 
            [
                'user_id' => 9,
                'title' => 'Caprese Salad with Balsamic Glaze',
                'images' => json_encode(['/images/caprese_salad.jpg']),
                'description' => "Indulge in the creamy delight of our Savory Spinach and Mushroom Risotto, a perfect blend of rich flavors and comforting textures. This dish starts with a base of Arborio rice, known for its ability to absorb flavors while maintaining a firm texture. We begin by sautéing finely chopped onions in a mix of butter and olive oil until they become translucent, setting the stage for a rich flavor profile.

                Next, we add fresh, sliced mushrooms, allowing them to cook down and release their earthy essence. The mushrooms are followed by a generous handful of spinach, which wilts beautifully into the mixture, adding a pop of color and a dose of healthy nutrients..\n\nIngredients:\n- Fresh Mozzarella Cheese\n- Ripe Tomatoes\n- Fresh Basil Leaves\n- Olive Oil\n- Balsamic Vinegar\n- Salt\n- Black Pepper\n- Garlic\n- Lemon Zest\n- Pine Nuts\n- Arugula\n- Honey",
                'total_calories' => 220,
                'total_time' => '00:20:00',
                'category' => 'Dinner',
                'is_liked' => 18
            ],

            [
                'user_id' => 10,
                'title' => 'Avocado Toast',
                'images' => json_encode(['/images/avocado_toast.jpg']),
                'description' => "Indulge in the creamy delight of our Savory Spinach and Mushroom Risotto, a perfect blend of rich flavors and comforting textures. This dish starts with a base of Arborio rice, known for its ability to absorb flavors while maintaining a firm texture. We begin by sautéing finely chopped onions in a mix of butter and olive oil until they become translucent, setting the stage for a rich flavor profile.

                Next, we add fresh, sliced mushrooms, allowing them to cook down and release their earthy essence. The mushrooms are followed by a generous handful of spinach, which wilts beautifully into the mixture, adding a pop of color and a dose of healthy nutrients..\n\nIngredients:\n- Whole Grain Bread\n- Ripe Avocados\n- Cherry Tomatoes\n- Red Onion\n- Lemon Juice\n- Olive Oil\n- Salt\n- Pepper\n- Chia Seeds\n- Feta Cheese\n- Fresh Basil\n- Red Chili Flakes",
                'total_calories' => 250,
                'total_time' => '00:15:00',
                'category' => 'Breakfast',
                'is_liked' => 20
            ],
            [
                'user_id' => 11,
                'title' => 'Berry Smoothie Bowl',
                'images' => json_encode(['/images/berry_smoothie_bowl.jpg']),
                'description' => "Indulge in the creamy delight of our Savory Spinach and Mushroom Risotto, a perfect blend of rich flavors and comforting textures. This dish starts with a base of Arborio rice, known for its ability to absorb flavors while maintaining a firm texture. We begin by sautéing finely chopped onions in a mix of butter and olive oil until they become translucent, setting the stage for a rich flavor profile.

                Next, we add fresh, sliced mushrooms, allowing them to cook down and release their earthy essence. The mushrooms are followed by a generous handful of spinach, which wilts beautifully into the mixture, adding a pop of color and a dose of healthy nutrients..\n\nIngredients:\n- Mixed Berries\n- Banana\n- Greek Yogurt\n- Honey\n- Almond Milk\n- Granola\n- Chia Seeds\n- Coconut Flakes\n- Fresh Mint\n- Almond Butter",
                'total_calories' => 350,
                'total_time' => '00:10:00',
                'category' => 'Breakfast',
                'is_liked' => 22
            ],
            [
                'user_id' => 12,
                'title' => 'Caesar Salad',
                'images' => json_encode(['/images/caesar_salad.jpg']),
                'description' => "Indulge in the creamy delight of our Savory Spinach and Mushroom Risotto, a perfect blend of rich flavors and comforting textures. This dish starts with a base of Arborio rice, known for its ability to absorb flavors while maintaining a firm texture. We begin by sautéing finely chopped onions in a mix of butter and olive oil until they become translucent, setting the stage for a rich flavor profile.

                Next, we add fresh, sliced mushrooms, allowing them to cook down and release their earthy essence. The mushrooms are followed by a generous handful of spinach, which wilts beautifully into the mixture, adding a pop of color and a dose of healthy nutrients..\n\nIngredients:\n- Romaine Lettuce\n- Croutons\n- Parmesan Cheese\n- Caesar Dressing\n- Lemon Juice\n- Garlic\n- Dijon Mustard\n- Worcestershire Sauce\n- Anchovies\n- Black Pepper\n- Olive Oil",
                'total_calories' => 200,
                'total_time' => '00:20:00',
                'category' => 'Lunch',
                'is_liked' => 15
            ],
            [
                'user_id' => 13,
                'title' => 'Beef Stroganoff',
                'images' => json_encode(['/images/beef_stroganoff.jpg']),
                'description' => "Indulge in the creamy delight of our Savory Spinach and Mushroom Risotto, a perfect blend of rich flavors and comforting textures. This dish starts with a base of Arborio rice, known for its ability to absorb flavors while maintaining a firm texture. We begin by sautéing finely chopped onions in a mix of butter and olive oil until they become translucent, setting the stage for a rich flavor profile.

                Next, we add fresh, sliced mushrooms, allowing them to cook down and release their earthy essence. The mushrooms are followed by a generous handful of spinach, which wilts beautifully into the mixture, adding a pop of color and a dose of healthy nutrients..\n\nIngredients:\n- Beef Sirloin\n- Mushrooms\n- Onions\n- Garlic\n- Beef Broth\n- Sour Cream\n- Dijon Mustard\n- Worcestershire Sauce\n- Egg Noodles\n- Parsley\n- Paprika\n- Butter",
                'total_calories' => 700,
                'total_time' => '01:00:00',
                'category' => 'Dinner',
                'is_liked' => 18
            ],
            [
                'user_id' => 14,
                'title' => 'Margherita Pizza',
                'images' => json_encode(['/images/margherita_pizza.jpg']),
                'description' => "Indulge in the creamy delight of our Savory Spinach and Mushroom Risotto, a perfect blend of rich flavors and comforting textures. This dish starts with a base of Arborio rice, known for its ability to absorb flavors while maintaining a firm texture. We begin by sautéing finely chopped onions in a mix of butter and olive oil until they become translucent, setting the stage for a rich flavor profile.

                Next, we add fresh, sliced mushrooms, allowing them to cook down and release their earthy essence. The mushrooms are followed by a generous handful of spinach, which wilts beautifully into the mixture, adding a pop of color and a dose of healthy nutrients..\n\nIngredients:\n- Pizza Dough\n- Tomato Sauce\n- Fresh Mozzarella\n- Tomatoes\n- Fresh Basil\n- Olive Oil\n- Salt\n- Pepper\n- Garlic\n- Oregano\n- Parmesan Cheese",
                'total_calories' => 800,
                'total_time' => '02:00:00',
                'category' => 'Dinner',
                'is_liked' => 25
            ],
            [
                'user_id' => 15,
                'title' => 'Falafel Wrap',
                'images' => json_encode(['/images/falafel_wrap.jpg']),
                'description' => "Indulge in the creamy delight of our Savory Spinach and Mushroom Risotto, a perfect blend of rich flavors and comforting textures. This dish starts with a base of Arborio rice, known for its ability to absorb flavors while maintaining a firm texture. We begin by sautéing finely chopped onions in a mix of butter and olive oil until they become translucent, setting the stage for a rich flavor profile.

                Next, we add fresh, sliced mushrooms, allowing them to cook down and release their earthy essence. The mushrooms are followed by a generous handful of spinach, which wilts beautifully into the mixture, adding a pop of color and a dose of healthy nutrients..\n\nIngredients:\n- Chickpeas\n- Onions\n- Garlic\n- Cilantro\n- Parsley\n- Cumin\n- Coriander\n- Lemon Juice\n- Pita Bread\n- Tahini Sauce\n- Lettuce\n- Tomatoes\n- Cucumber",
                'total_calories' => 550,
                'total_time' => '01:20:00',
                'category' => 'Lunch',
                'is_liked' => 20
            ]
        ];
        foreach ($recipes as $recipeData) {
            Recipe::create($recipeData);
        }
        
           
            }
}
