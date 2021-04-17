<?php

namespace Database\Seeders;

use App\Models\EventCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventCategory::create(['name' => 'Educational Events']);
        EventCategory::create(['name' => 'Entertainment Events']);
        EventCategory::create(['name' => 'Sports Events']);
        EventCategory::create(['name' => 'Religious Events']);
    }
}
