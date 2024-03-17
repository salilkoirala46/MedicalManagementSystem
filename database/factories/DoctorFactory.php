<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Doctor;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    protected $model = Doctor::class;

    public function definition()
    {
        // Create a new user
        $user = User::factory()->create([
            'user_type' => 1
        ]);

        return [
            'user_id' => $user->id, // Assign the user_id from the created user
            'name' => $user->name,
            'email' => $user->email,
            'clinic_id'=>$this->faker->randomElement([1,2,3]),
            // Add other properties as needed
        ];
    }
}
