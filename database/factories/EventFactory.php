<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'event_category_id' => $this->faker->numberBetween(1, 4),
            'agent_id' => 1,
            'name' => $this->faker->sentence,
            'location' => $this->faker->city,
            'date' => $this->faker->dateTimeBetween('now', '+2 years'),
            'description' => $this->faker->paragraph,
            'banner' => 'images/sample_banner.jpg',
        ];
    }
}
