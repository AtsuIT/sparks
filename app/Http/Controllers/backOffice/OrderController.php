<?php

namespace App\Http\Controllers\backOffice;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\City;
use App\Services\backOffice\OrderService;
use Illuminate\Support\Facades\Lang;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    protected $orderService;
    
    function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAymakan(Request $request)
    {
        if ($request->ajax()) 
        {
            $orders = $this->orderService->getOrders();
            if($orders->count() == 0)
            {
                $this->orderService->storeOrderByApi();
                $orders = $this->orderService->getOrders();
            }
            return DataTables::of($orders->where('order_type','aymakan'))
                ->addColumn('action', function ($row) {
                return '<a class="btn btn-secondary" href="/orders-timeline/'.$row->id.'"><i class="fas fa-business-time"></i></a>';
                })
                ->editColumn('info', function ($row) {
                })
            ->escapeColumns([])
            ->make(true);
        }
        return view('orders.index-aymakan');
    }

    public function indexSparks(Request $request)
    {
        if ($request->ajax()) 
        {
            $orders = $this->orderService->getOrders();
            return DataTables::of($orders->where('order_type','!=','aymakan'))
            ->addColumn('action', function ($row) {
                $csrf = csrf_token();
                return '<form method="POST" action="/orders-destroy/'.$row->id.'">
                                    <input name="_token" type="hidden" value='.$csrf.'>
                                    <input name="_method" type="hidden" value="DELETE">
                            <a class="btn btn-info" href="/orders-show/'.$row->id.'"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-primary" href="/orders-edit/'.$row->id.'"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-secondary" href="/orders-timeline/'.$row->id.'"><i class="fas fa-business-time"></i></a>
                            <button type="submit" class="sa-warning btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>';
                })
                ->editColumn('info', function ($row) {
                })
                ->escapeColumns([])
            ->make(true);
        }
        return view('orders.index-sparks');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('orders.create',['cities'=>$cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $this->orderService->storeOrder($request);
        return redirect()->route('orders-sparks')->with('success', Lang::get('t-order-created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->orderService->findOrder($id);
        $cities = City::all();
        return view('orders.show',compact('order','cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = $this->orderService->findOrder($id);
        $cities = City::all();
        return view('orders.edit',compact('order','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        $this->orderService->updateOrder($request, $id);
        return redirect()->route('orders-sparks')->with('success',Lang::get('t-order-updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->orderService->destroyOrder($id);
        return redirect()->route('orders-sparks')->with('error', Lang::get('t-order-deleted'));

    }
    public function timeline($id)
    {
        $order = $this->orderService->findOrder($id);
        return view('orders.timeline',compact('order'));
    }
}
