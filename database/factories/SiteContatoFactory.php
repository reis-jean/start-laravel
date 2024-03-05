<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteContato>
 */
class SiteContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //Forma de fazer com a versão laravel 10
        return [
            'nome' => fake()->name(),
            'telefone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'motivo_contato' => fake()->numberBetween(1, 3), // Número aleatório entre 1 e 3
            'mensagem' => fake()->text(200),
        ];

        //dessa forma tbm funciona
        // return [
        //     'nome' => $this->faker->name(),
        //     'telefone' => $this->faker->phoneNumber(),
        //     'email' => $this->faker->unique()->safeEmail(),
        //     'motivo_contato' => $this->faker->numberBetween(1, 3), // Número aleatório entre 1 e 3
        //     'mensagem' => $this->faker->text(200),
        // ];
    }
}
