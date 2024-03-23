<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as FakerFactory;

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
        $faker = FakerFactory::create();
        return [
            'id' => $faker->unique()->randomNumber(5),
            'role' => $faker->randomElement(['admin', 'doctor', 'patient']),
            'email' => $faker->unique()->email,
            'password' => bcrypt('password'), // Thay 'password' bằng mật khẩu mà bạn muốn sử dụng
            'name' => $faker->name,
            'phone' => $faker->phoneNumber,
            'address' => $faker->address,
            'url_image' => rand(1,4).'.jpg',
            'created_at' => now(),
            'updated_at' => now(),
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
