<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name=$this->faker->realText(rand(30, 40));
        return [
            'parent_id' => rand(1, 9),
            'name' => $name,
            'content' => $this->faker->realText(rand(150, 200)),
            'slug' => Str::slug($name),
        ];
    }
}
