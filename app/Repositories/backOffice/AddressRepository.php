<?php

namespace App\Repositories\backOffice;

use App\Helpers\GuzzleHttpHelper;
use App\Models\Address;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Yajra\DataTables\DataTables;

//use Your Model

/**
 * Class AddressRepository.
 */
class AddressRepository extends BaseRepository
{
    protected $address;
    protected $guzzle;

    function __construct(Address $address, GuzzleHttpHelper $guzzle)
    {
        $this->address = $address;
        $this->guzzle = $guzzle;
        
    }
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Address::class;
    }

    public function allAddress()
    {
        $address = Address::get();
            return DataTables::of($address)
            ->addColumn('action', function ($row) {
                $csrf = csrf_token();
                return '<form method="POST" action="/address-destroy/'.$row->id.'">
                                    <input name="_token" type="hidden" value='.$csrf.'>
                                    <input name="_method" type="hidden" value="DELETE">
                            <a class="btn btn-info" href="/address-show/'.$row->id.'"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-primary" href="/address-edit/'.$row->id.'"><i class="fas fa-pencil-alt"></i></a>
                            <button type="submit" class="sa-warning btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>';
                })
                ->editColumn('info', function ($row) {
                    return substr($row->info,0,15);
               })
               ->escapeColumns([])
            ->make(true);
    }

    public function getAddress()
    {
        return Address::all();
    }

    public function storeAddressByApi()
    {
        $client = $this->guzzle::setAuth();
        $address = $client->getAddress();
        $data = $address['data']['address'];
        foreach ($data as $key => $value) 
        {
            $findAddress = Address::where('address_type','aymakan')->first();
            if (!$findAddress) 
            {
                $this->storeAddress($value,'aymakan');
            }
        }
        return response()->json(['success'=>true]);
    }

    public function storeAddress($data,$type=null)
    {
        $data = array(
            'title' => $data['title'],
            'name' => $data['name'],
            'description' => $data['description'],
            'email' => $data['email'],
            'city' => $data['city'],
            'country' => $data['country'],
            'address' => $data['address'],
            'postcode' => $data['postcode'],
            'phone' => $data['phone'],
            'neighbourhood' => $data['neighbourhood'],
            'address_type' => ($type ? $type : 'sparks'),
        );
        Address::create($data);
        // $client = $this->guzzle::setAuth();
        // $client->createAddress($data);
    }

    public function findAddress($id)
    {
        return Address::findOrFail($id);
    }

    public function updateAddress($data, $id)
    {
        $address = $this->findAddress($id);
        $data = array(
            'title' => $data['title'],
            'name' => $data['name'],
            'description' => $data['description'],
            'email' => $data['email'],
            'city' => $data['city'],
            'country' => $data['country'],
            'address' => $data['address'],
            'postcode' => $data['postcode'],
            'phone' => $data['phone'],
            'neighbourhood' => $data['neighbourhood'],
        );
        $address->update($data);
        // $client = $this->guzzle::setAuth();
        // $client->updateAddress($data);
    }

    public function destroyAddress($id)
    {
        $address = $this->findAddress($id);
        $client = $this->guzzle::setAuth();
        // $client->deleteAddress([
        //     'id' => $address->id
        // ]);
        $address->delete();
    }
}
