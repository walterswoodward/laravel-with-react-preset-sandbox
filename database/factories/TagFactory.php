<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // TODO: This would break if one of these enums were removed in the future
        // so it would be more sustainable to grab this list directly from the tags table
        // via a custom Tags Model function like `getPossibleEnums($column = 'name')`.
        return [
            'name' => $this->faker->randomElement(['personal', 'family', 'work', 'vacation'])
        ];
    }
}
