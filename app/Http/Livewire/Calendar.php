<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class Calendar extends Component
{
    // https://www.tutsmake.com/laravel-livewire-fullcalendar-integration-example/

    public $events = '';

    public function getevent()
    {
        $events = Event::select('id','title','start')->get();
        return  json_encode($events);
    }

    public function addevent($event)
    {
        $input['title'] = $event['title'];
        $input['start'] = $event['start'];
        $input['event_number'] = $event['event_number'];
        Event::create($input);
    } 

    public function eventDrop($event, $oldEvent)
    {
        $event['id'] = Event::where('event_number', $event['extendedProps']['event_number'])->first()->id;
        $eventdata = Event::find($event['id']);
        $eventdata->start = $event['start'];
        $eventdata->save();
    }

    public function render()
    {
        $events = Event::select('id','title','start','event_number')->get();
        $this->events = json_encode($events);
        return view('livewire.calendar');
    }
}
