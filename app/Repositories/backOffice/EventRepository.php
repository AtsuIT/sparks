<?php

namespace App\Repositories\backOffice;

use App\Http\Resources\EventResource;
use App\Models\Event;
use Carbon\Carbon;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class EventRepository.
 */
class EventRepository extends BaseRepository
{
    protected $event;

    function __construct(Event $event)
    {
        $this->event = $event;
        
    }
    
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Event::class;
    }

    public function getEvents()
    {
        $events = Event::all();
        return EventResource::collection($events);
    }

    public function storeEvent($data)
    {
        Event::create([
            'name' => $data['title'],
            'start_date' => Carbon::parse($data['start'])->format('Y-m-d'),
            'color' => $data['className'],
            'order_id' => $data['orderId'],
        ]);
    }

    public function findEvent($id)
    {
        return Event::findOrFail($id);
    }

    public function updateEvent($data, $id)
    {
        $event = $this->findEvent($id);
        $event->name = $data['title'];
        $event->start_date = Carbon::parse($data['start'])->format('Y-m-d');
        $event->color = $data['className'];
        $event->order_id = $data['orderId'];
        $event->save();
    }

    public function destroyEvent($id)
    {
        $event = $this->findEvent($id);
        $event->delete();
    }
}
