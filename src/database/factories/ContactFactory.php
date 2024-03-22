<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => random_int(1,5),
            'last_name' => $this->faker->lastName(),
            'first_name' => $this->faker->firstName(),
            'gender' => $this->faker->numberBetween(1,3),
            'email' => $this->faker->email(),
            'tel' => $this->faker->regexify('[0-9]{11}'),
            'address' => $this->faker->city(),
            'building' => $this->faker->secondaryAddress(),
            'detail' => $this->faker->realText(120),
        ];
    }
}
