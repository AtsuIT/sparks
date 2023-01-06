<?php

namespace App\Repositories\backOffice;

use App\Helpers\GuzzleHttpHelper;
use App\Models\Address;
use Illuminate\Support\Facades\DB;
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
        DB::table('addresses')->truncate();
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

    public function storeAddress($data)
    {
        Address::create([
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
        ]);
        $client = $this->guzzle::setAuth();
        $client->createAddress([
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
        ]);
    }

    public function findAddress($id)
    {
        return Address::findOrFail($id);
    }

    public function updateAddress($data, $id)
    {
        $address = $this->findAddress($id);
        $address->name = $data['name'];
        $address->description = $data['description'];
        $address->title = $data['title'];
        $address->email = $data['email'];
        $address->city = $data['city'];
        $address->country = $data['country'];
        $address->phone = $data['phone'];
        $address->postcode = $data['postcode'];
        $address->neighbourhood = $data['neighbourhood'];
        $address->address = $data['address'];
        $address->save();
        $client = $this->guzzle::setAuth();
        $client->updateAddress([
            'id' => $address->id,
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
        ]);
    }

    public function destroyAddress($id)
    {
        $address = $this->findAddress($id);
        $client = $this->guzzle::setAuth();
        $client->deleteAddress([
            'id' => $address->id
        ]);
        $address->delete();
    }
}
