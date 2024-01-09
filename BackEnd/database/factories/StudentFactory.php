<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registration' => $this->faker->unique()->text(40),
            'codercp' => $this->faker->unique()->text(10),
            'cin' => $this->faker->unique()->text(20),
            'name' => $this->faker->firstName,
            'familyname' => $this->faker->lastName,
            'dateofbirth' => $this->faker->date,
            'country' => $this->faker->country,
            'picture' => $this->faker->imageUrl,
            'university' => $this->faker->text(50),
            'speciality' => $this->faker->text(50),
            'level' => $this->faker->text(20),
            'cost' => $this->faker->text(20),
            'amountpay' => $this->faker->text(20),
            'amountremaining' => $this->faker->text(20),
            'integrationdate' => $this->faker->date,
            'enddate' => $this->faker->date,
            'phone' => $this->faker->unique()->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'statut' => $this->faker->numberBetween(0, 1),
        ];
    }
}
