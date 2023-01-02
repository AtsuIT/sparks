<?php

namespace App\Repositories\Interfaces\backOffice;

/**
 * Interface EventServiceInterface
 * @package App\Services\Interfaces
 */
interface EventRepositoryInterface
{
    public function getEvents();
    public function storeEvent($data);
    public function findEvent($id);
    public function updateEvent($data, $id);
    public function destroyEvent($id);
}
