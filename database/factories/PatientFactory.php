<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Patient;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    protected $model = Patient::class;

    public function definition()
    {
        // Create a new user
        $user = User::factory()->create([
            'user_type' => 0
        ]);

        return [
            'user_id' => $user->id, // Assign the user_id from the created user
            'name' => $user->name,
            'email' => $user->email,
            'clinic_id'=>$this->faker->randomElement([1,2,3]),
        ];
    }
}
