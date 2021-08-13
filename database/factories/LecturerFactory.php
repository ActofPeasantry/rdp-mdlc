<?php

namespace Database\Factories;

use App\Models\Lecturer;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User as User;

class LecturerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lecturer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::factory()->create();

        return [
            'name' => $this->faker->name,
            'user_id' => $user->id,
            'nip' =>  rand(1111111111,9999999999),
            'birthplace' =>  $this->faker->city,
            'address' =>  $this->faker->address,
            'phone' =>  $this->faker->phoneNumber,
        ];
    }
}
