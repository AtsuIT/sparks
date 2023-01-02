<?php

namespace App\Services\backOffice;

use App\Repositories\backOffice\EventRepository;
use App\Services\Interfaces\backOffice\EventServiceInterface;

/**
 * Class EventService
 * @package App\Services
 */
class EventService implements EventServiceInterface
{
    protected $eventRepository;

    function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
        
    }

    public function getEvents()
    {
        return $this->eventRepository->getEvents();
    }

    public function storeEvent($data)
    {
        return $this->eventRepository->storeEvent($data);
    }

    public function findEvent($id)
    {
        return $this->eventRepository->findEvent($id);
    }

    public function updateEvent($data, $id)
    {
        return $this->eventRepository->updateEvent($data, $id);
    }

    public function destroyEvent($id)
    {
        return $this->eventRepository->destroyEvent($id);
    }
}
