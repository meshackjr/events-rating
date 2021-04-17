<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class Questions extends Component
{
    public $qn1, $qn1type = 'short', $qn1options;
    public $qn2, $qn2type = 'short', $qn2options;
    public $qn3, $qn3type = 'short', $qn3options;
    public $eventId;

    public function submit(){
        if ($this->qn1 != null){
            if ($this->qn1type == 'options'){
                $this->validate(['qn1options' => 'required'],
                    ['qn1options.required' => 'Please provide options for question 1.']);

                // create question and save options
                $optionsArray = explode(';', $this->qn1options);
                Question::create([
                    'type' => $this->qn1type,
                    'question' => $this->qn1,
                    'options' => $this->qn1options,
                    'event_id' => $this->eventId,
                ]);
            }
            Question::create([
                'type' => $this->qn1type,
                'question' => $this->qn1,
                'event_id' => $this->eventId,
            ]);
        }
        if ($this->qn2 != null){
            if ($this->qn2type == 'options'){
                $this->validate(['qn2options' => 'required'],
                    ['qn2options.required' => 'Please provide options for question 1.']);

                // create question and save options
                $optionsArray = explode(';', $this->qn2options);
                Question::create([
                    'type' => $this->qn2type,
                    'question' => $this->qn2,
                    'options' => $this->qn2options,
                    'event_id' => $this->eventId,

                ]);
            }
            Question::create([
                'type' => $this->qn2type,
                'question' => $this->qn2,
                'event_id' => $this->eventId,

            ]);
        }
        if ($this->qn3 != null){
            if ($this->qn3type == 'options'){
                $this->validate(['qn3options' => 'required'],
                    ['qn3options.required' => 'Please provide options for question 1.']);

                // create question and save options
                $optionsArray = explode(';', $this->qn3options);
                Question::create([
                    'type' => $this->qn3type,
                    'question' => $this->qn3,
                    'options' => $this->qn3options,
                    'event_id' => $this->eventId,

                ]);
            }
            Question::create([
                'type' => $this->qn3type,
                'question' => $this->qn3,
                'event_id' => $this->eventId,

            ]);
        }

        session()->flash('success', 'Questions created successfully');
        $this->redirect(route('agent.events.index'));
    }

    public function render()
    {
        return view('livewire.questions');
    }
}
