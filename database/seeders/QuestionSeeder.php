<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Question::create([
            'event_id' => 1,
            'type' => 'short',
            'question' => 'How was your experience with the event ?'
        ]);

        Question::create([
            'event_id' => 1,
            'type' => 'options',
            'question' => 'How Likely are you to attend again ?',
            'options' => 'Very Likely;Likely;I will think about it;Not Likely;I will not',
        ]);
    }
}
