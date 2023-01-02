<?php

namespace App\Services\Interfaces\backOffice;

/**
 * Interface EventServiceInterface
 * @package App\Services\Interfaces
 */
interface EventServiceInterface
{
    public function getEvents();
    public function storeEvent($data);
    public function findEvent($id);
    public function updateEvent($data, $id);
    public function destroyEvent($id);
}
