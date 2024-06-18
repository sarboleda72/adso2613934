<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   

        return [
            'document'          =>fake()->isbn13(),
            'gender'            => $gender=fake()->randomElement(['Male','Female']),
            'fullname'          => fake()->name($gender)." ".fake()->lastName(),
            'birthdate'         => fake()->dateTimeBetween('-30 years','2004-01-01'),
            'phone'             => fake()->phoneNumber(),
            'photo'             => substr(fake()->image($dir = './public/img', $width = 640, $height = 480),13),
            'email'             => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'          => static::$password ??= Hash::make('password'),
            'remember_token'    => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
