<?php

namespace App\Services\Interfaces\backOffice;

/**
 * Interface OrderServiceInterface
 * @package App\Services\Interfaces
 */
interface OrderServiceInterface
{
    public function allOrders();
    public function getOrders();
    public function storeOrder($data);
    public function findOrder($id);
    public function updateOrder($data, $id);
    public function destroyOrder($id);
}
