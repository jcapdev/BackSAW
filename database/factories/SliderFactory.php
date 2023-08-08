<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SliderFactory extends Factory
{
    protected $model = Slider::class;

    public function definition()
    {
        return [
			'img' => $this->faker->name,
			'title' => $this->faker->name,
			'text' => $this->faker->name,
			'btn' => $this->faker->name,
			'btntext' => $this->faker->name,
        ];
    }
}
