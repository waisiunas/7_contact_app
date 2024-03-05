<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryIds = Category::all()->pluck('id')->toArray();

        return [
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->lastName,
            'last_name' => $this->faker->lastName,
            'category_id' => $this->faker->randomElement($categoryIds),
            'mobile_number' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'facebook' => 'https://www.facebook.com/',
            'instagram' => 'https://www.instagram.com/',
            'youtube' => 'https://www.youtube.com/',
            'dob' => $this->faker->date,
            'picture' => null,
            'address' => $this->faker->address,
        ];
    }
}
