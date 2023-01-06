<?php

namespace App\Repositories\Interfaces\backOffice;

/**
 * Interface CityServiceInterface
 * @package App\Services\Interfaces
 */
interface CityRepositoryInterface
{
    public function allCity();
    public function getCity();
    public function storeCityByApi();
}
