<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->name,
            'country_id' => \App\Models\Country::factory(),
            'city_id' => \App\Models\City::factory(),
            'description'=> $this->faker->paragraph,
            'address'=> $this->faker->address,
            'postal_code'=> $this->faker->postcode,
            'contact_no'=> $this->faker->phoneNumberWithExtension,
            'email'=> $this->faker->email,
            'rating'=> $this->faker->randomFloat(1, 1, 5),
            'check_in'=> $this->faker->dateTimeBetween('12:00', '16:00')->format('H:i:s'),
            'check_out'=> $this->faker->dateTimeBetween('12:00', '16:00')->format('H:i:s'),
            'hotel_temp_image_name' => $this->faker->image('public/storage',640,480, null, false),
        ];
    }
}
