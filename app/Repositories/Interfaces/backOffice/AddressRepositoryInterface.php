<?php

namespace App\Repositories\Interfaces\backOffice;

/**
 * Interface AddressServiceInterface
 * @package App\Services\Interfaces
 */
interface AddressRepositoryInterface
{
    public function allAddress();
    public function getAddress();
    public function storeAddressByApi();
    public function storeAddress($data);
    public function findAddress($id);
    public function updateAddress($data, $id);
    public function destroyAddress($id);
}
