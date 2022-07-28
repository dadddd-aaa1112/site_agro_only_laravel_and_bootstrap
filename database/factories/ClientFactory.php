<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Client::class;

    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'contract_date' => $this->faker->dateTimeThisMonth,
            'cost_deliveries' => random_int(1, 10000),
            'region' => $this->faker->address
        ];
    }
}
