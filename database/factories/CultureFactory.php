<?php

namespace Database\Factories;

use App\Models\Culture;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Culture>
 */
class CultureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Culture::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word,
        ];
    }
}
