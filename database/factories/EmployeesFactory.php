<?php

namespace Database\Factories;

use App\Models\Employees;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employees::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();
        return [
            'firstname' => $name,
            'name' => $name,
            'email' => $this->faker->unique()->safeEmail(),
            'companies_id' => $this->faker->numberBetween($min = 1, $max = 10),
            'phone' => $this->faker->phoneNumber(),
        ];
    }
}
