<?php

namespace App\Services\backOffice;

use App\Repositories\backOffice\OrderRepository;
use App\Services\Interfaces\backOffice\OrderServiceInterface;

/**
 * Class OrderService
 * @package App\Services
 */
class OrderService implements OrderServiceInterface
{
    protected $orderRepository;

    function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
        
    }
    
    public function allOrders()
    {
        return $this->orderRepository->allOrders();
    }

    public function getOrders()
    {
        return $this->orderRepository->getOrders();
    }

    public function storeOrder($data)
    {
        return $this->orderRepository->storeOrder($data);
    }

    public function findOrder($id)
    {
        return $this->orderRepository->findOrder($id);
    }

    public function updateOrder($data, $id)
    {
        return $this->orderRepository->updateOrder($data, $id);
    }

    public function destroyOrder($id)
    {
        return $this->orderRepository->destroyOrder($id);
    }
}
