<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->unique()->productName;
        $price = $this->faker->randomFloat(2, 10, 999);
        $compare_price = $this->faker->boolean(35) ? $price + $this->faker->randomFloat(2, 5, 150) : null;
        return [
            'store_id' => Store::factory(),
            'category_id' => Category::factory(),
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => $this->faker->sentence(12),
            'image' => $this->faker->imageUrl(600, 600),
            'price' => $price,
            'compare_price' => $compare_price,
            'rating' => $this->faker->randomFloat(1, 1, 5),
            'featured' => $this->faker->boolean(20),
            'status' => $this->faker->randomElement(['active', 'draft', 'archived']),
        ];
    }
}
