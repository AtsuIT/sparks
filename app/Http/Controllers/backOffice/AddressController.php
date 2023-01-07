<?php

namespace App\Http\Controllers\backOffice;

use App\Helpers\GuzzleHttpHelper;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Services\backOffice\AddressService;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class AddressController extends Controller
{
    protected $addressService;
    
    function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) 
        {
            $this->addressService->storeAddressByApi();
            $address = $this->addressService->getAddress();
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
                ->editColumn('reference', function ($row) {
               })
               ->escapeColumns([])
            ->make(true);
        }
        return view('address.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $request)
    {
        $this->addressService->storeAddress($request);
        return redirect()->route('address')->with('success','Address created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = $this->addressService->findAddress($id);
        return view('address.show',compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address = $this->addressService->findAddress($id);
        return view('address.edit',compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddressRequest $request, $id)
    {
        $this->addressService->updateAddress($request, $id);
        return redirect()->route('address')->with('success','Address updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->addressService->destroyAddress($id);
        return redirect()->route('address')->with('success','Address deleted successfully');

    }
}
