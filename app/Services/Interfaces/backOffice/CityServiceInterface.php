<?php

namespace App\Services\Interfaces\backOffice;

/**
 * Interface CityServiceInterface
 * @package App\Services\Interfaces
 */
interface CityServiceInterface
{
    public function allCity();
    public function getCity();
    public function storeCityByApi();
}
