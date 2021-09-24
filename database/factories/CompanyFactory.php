<?php

namespace Database\Factories;

use App\Models\Company;

use Illuminate\Database\Eloquent\Factories\Factory;

use Storage;

use File;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $filepath = storage_path('app/public/img_logo');

        if(!File::exists($filepath)){
            File::makeDirectory($filepath);  //follow the declaration to see the complete signature
        }
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'logo' => $this->faker->image($filepath,400, 300,null,false),
            'website' => $this->faker->text(),
        ];
    }
}
