<?php

namespace App\Repositories\Interfaces\backOffice;

/**
 * Interface OrderServiceInterface
 * @package App\Services\Interfaces
 */
interface OrderRepositoryInterface
{
    public function allOrders();
    public function getOrders();
    public function storeOrderByApi();
    public function storeOrder($data);
    public function findOrder($id);
    public function updateOrder($data, $id);
    public function destroyOrder($id);
}
