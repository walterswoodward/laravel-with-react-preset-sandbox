<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Video::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->country(),
            'director' => $this->faker->name(),
            'rating' => $this->faker->numberBetween(0, 10),
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(5, 20),
            'availability' => $this->faker->boolean(50),
        ];
    }
}
