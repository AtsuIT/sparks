<?php

namespace App\Services\backOffice;

use App\Repositories\backOffice\CityRepository;
use App\Services\Interfaces\backOffice\CityServiceInterface;

/**
 * Class CityService
 * @package App\Services
 */
class CityService implements CityServiceInterface
{
    protected $cityRepository;

    function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }
    
    public function allCity()
    {
        return $this->cityRepository->allCity();
    }

    public function getCity()
    {
        return $this->cityRepository->getCity();
    }

    public function storeCityByApi()
    {
        return $this->cityRepository->storeCityByApi();
    }

}
