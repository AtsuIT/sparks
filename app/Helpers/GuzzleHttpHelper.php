<?php

namespace App\Helpers;

use App\Models\Address;

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

    static function cities()
    {
        return response()->json(GuzzleHttpHelper::setAuth()->getCityList());
    }

    static function address()
    {
        return response()->json(GuzzleHttpHelper::setAuth()->getAddress());
    }

    static function shipments()
    {
        $response = GuzzleHttpHelper::setAuth()->getCustomerShipments();
        $data = collect($response['data']['data'])->pluck('tracking_number')->toArray();
        return $data;
    }

    static function shipmentByReference()
    {
        $data = GuzzleHttpHelper::shipments();
        $ok=GuzzleHttpHelper::setAuth()->trackShipment($data);
        $ab = collect($ok['data']['shipments']);
        return $ab;
    }

    static function createShipment()
    {
        $orderShipment = array(
            "requested_by"=> "Test3",
            "declared_value"=> 1,
            "declared_value_currency"=> "SAR",
            "reference"=> "",
            "is_cod"=> 1,
            "cod_amount"=> 12,
            "currency"=> "SAR",
            "delivery_name"=> "Ahmed",
            "delivery_email"=> "Ahmed@email.com",
            "delivery_city"=> "Riyadh",
            "delivery_address"=> "Riyadh",
            "delivery_neighbourhood"=> "Al Sahafa",
            "delivery_postcode"=> 11543,
            "delivery_country"=> "SA",
            "delivery_phone"=> 540000000,
            "delivery_description"=> "",
            "collection_name"=> "Ahmed",
            "collection_email"=> "Ahmed@email.com",
            "collection_city"=> "Riyadh",
            "collection_address"=> "Al Sahafa",
            "collection_neighbourhood"=> "Riyadh",
            "collection_postcode"=> 11543,
            "collection_country"=> "SA",
            "collection_phone"=> 540000000,
            "collection_description"=> "",
            "weight"=> 38,
            "pieces"=> 1,
            "items_count"=> 1
        );
        $client = GuzzleHttpHelper::setAuth();
        $response = $client->createShipment($orderShipment);
        return response()->json($response);
    }

    static function trackingShipment()
    {
        $client = GuzzleHttpHelper::setAuth();
        $response = $client->trackShipment(['AY-9624441706']);
        return response()->json($response);
    }

    static function cancelShipment()
    {
        $client = GuzzleHttpHelper::setAuth();
        $response = $client->cancelShipment(['tracking' => "AY-9624441706"]);
        return response()->json($response);
    }

    static function cancelShipmentByReference()
    {
        $client = GuzzleHttpHelper::setAuth();
        $response = $client->cancelShipmentByReference(["17744382"]);
        return response()->json($response);
    }

    static function trackingByReference()
    {
        $client = GuzzleHttpHelper::setAuth();
        $response = $client->shipmentByReference(['17744382']);
        return response()->json($response);
    }

    static function createAddress()
    {
        $data = array(
            "title"=> "Aymkana",
            "name"=> "test",
            "email"=> "test@test.com",
            "city"=> "Riyadh",
            "address"=> "Saudi Arabia Makkah{Mecca} Jeddah Al Muntazahat شارع العام طريق الحرزات 03088",
            "neighbourhood"=> "Al Wizarat",
            "postcode"=> "75760",
            "phone"=> "+966598998110",
            "description"=> "Home address"
        );
        $client = GuzzleHttpHelper::setAuth();
        $response = $client->createAddress($data);
        return response()->json($response);
    }

    static function ok(){

        $client = new \Aymakan\Client();
        $client->setApikey('9bc2d85eb402dc18ad302bceb70cf92a-fe0795fe-f7ec-4d5a-8381-1f4a8c0576fe-45c23b8333ad52ae8f6e6603fc8d4690/b364542b33ccb13958c9c2f9e2b7f182/ca3aea22-a56e-4541-832c-81cc3e30456d');

        //Track single shipment by reference number
        $response = $client->shipmentByReference(['200018179']);

        ### Cancel Shipping Using Reference
        $response = $client->cancelShipment(['tracking' => "AY4091346662"]);

        return response()->json($response);
    }
}
