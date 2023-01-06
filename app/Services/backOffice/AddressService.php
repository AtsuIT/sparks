<?php

namespace App\Services\backOffice;

use App\Repositories\backOffice\AddressRepository;
use App\Services\Interfaces\backOffice\AddressServiceInterface;

/**
 * Class AddressService
 * @package App\Services
 */
class AddressService implements AddressServiceInterface
{
    protected $addressRepository;

    function __construct(AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }
    
    public function allAddress()
    {
        return $this->addressRepository->allAddress();
    }

    public function getAddress()
    {
        return $this->addressRepository->getAddress();
    }

    public function storeAddressByApi()
    {
        return $this->addressRepository->storeAddressByApi();
    }

    public function storeAddress($data)
    {
        return $this->addressRepository->storeAddress($data);
    }

    public function findAddress($id)
    {
        return $this->addressRepository->findAddress($id);
    }

    public function updateAddress($data, $id)
    {
        return $this->addressRepository->updateAddress($data, $id);
    }

    public function destroyAddress($id)
    {
        return $this->addressRepository->destroyAddress($id);
    }
}
