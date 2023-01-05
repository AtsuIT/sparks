<?php

namespace App\Helpers;

class GuzzleHttpHelper
{
    /**
     * setAuth.
     *
     */
    static function setAuth()
    {
        $client = new \Aymakan\Client();
        $client->setApikey('9bc2d85eb402dc18ad302bceb70cf92a-fe0795fe-f7ec-4d5a-8381-1f4a8c0576fe-45c23b8333ad52ae8f6e6603fc8d4690/b364542b33ccb13958c9c2f9e2b7f182/ca3aea22-a56e-4541-832c-81cc3e30456d');
        return $client;
    }

    /**
     * Connexion.
     *
     * @param  string $url  request
     */
    static function ping()
    {
        return response()->json(GuzzleHttpHelper::setAuth()->pingApi());
    }

    static function ok(){

            // set token
            $client->setApikey('9bc2d85eb402dc18ad302bceb70cf92a-fe0795fe-f7ec-4d5a-8381-1f4a8c0576fe-45c23b8333ad52ae8f6e6603fc8d4690/b364542b33ccb13958c9c2f9e2b7f182/ca3aea22-a56e-4541-832c-81cc3e30456d');
            // set Sandbox testing mode
            $client->pingApi();
            ### Cities Method
            $response = $client->getCityList();
            ### Cities Method

            $response = $client->getCityList();
            ### Create Shipping
            // $response = $client->createShipment($data);

            //Track single shipment by reference number
            $response = $client->shipmentByReference(['200018179']);

            ### Cancel Shipping Using Reference
            $response = $client->cancelShipment(['tracking' => "AY4091346662"]);

            ### Get Address
            $response = $client->getAddress();
            dd($response);
    }
}
