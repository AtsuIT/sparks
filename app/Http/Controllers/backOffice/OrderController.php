<?php

namespace App\Http\Controllers\backOffice;

use App\Helpers\GuzzleHttpHelper;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Services\backOffice\OrderService;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

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
    public function index(Request $request)
    {
        if ($request->ajax()) 
        {
            // $this->orderService->getOrders();
            $orders = GuzzleHttpHelper::shipmentByReference();
            return DataTables::of($orders)
            ->addColumn('action', function ($row) {
                $csrf = csrf_token();
                return '<form method="POST" action="/orders-destroy/'.$row['tracking_number'].'">
                                    <input name="_token" type="hidden" value='.$csrf.'>
                                    <input name="_method" type="hidden" value="DELETE">
                            <a class="btn btn-info" href="/orders-show/'.$row['tracking_number'].'"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-primary" href="/orders-edit/'.$row['tracking_number'].'"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-secondary" href="/orders-timeline/'.$row['tracking_number'].'"><i class="fas fa-business-time"></i></a>
                            <button type="submit" class="sa-warning btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>';
                })
                ->editColumn('reference', function ($row) {
                    return 'SPA-'. Str::uuid()->toString();
               })
               ->escapeColumns([])
            ->make(true);
        }
        return view('orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
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
        return redirect()->route('orders')->with('success','Order created successfully');
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
        return view('orders.show',compact('order'));
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
        return view('orders.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->orderService->updateOrder($request, $id);
        return redirect()->route('orders')->with('success','Order updated successfully');
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
        return redirect()->route('orders')->with('success','Order deleted successfully');

    }
    public function timeline($id)
    {
        $order = $this->orderService->findOrder($id);
        return view('orders.timeline',compact('order'));
    }
}
