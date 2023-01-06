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

    static function storeAddress()
    {
        $address = GuzzleHttpHelper::setAuth()->getAddress();
        $data = $address['data']['address'];
        foreach($data as $key=> $value)
        {
            Address::create([
                'title' => $value['title'],
                'name' => $value['name'],
                'description' => $value['description'],
                'email' => $value['email'],
                'city' => $value['city'],
                'country' => $value['country'],
                'address' => $value['address'],
                'postcode' => $value['postcode'],
                'phone' => $value['phone'],
                'neighbourhood' => $value['neighbourhood'],
            ]);
        }
        return response()->json(['success'=>true]);
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
