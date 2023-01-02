<?php

namespace App\Repositories\backOffice;

use App\Models\Order;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Yajra\DataTables\DataTables;

//use Your Model

/**
 * Class OrderRepository.
 */
class OrderRepository extends BaseRepository
{
    protected $order;

    function __construct(Order $order)
    {
        $this->order = $order;
        
    }
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Order::class;
    }

    public function allOrders()
    {
        $orders = Order::get();
            return DataTables::of($orders)
            ->addColumn('action', function ($row) {
                $csrf = csrf_token();
                return '<form method="POST" action="/orders-destroy/'.$row->id.'">
                                    <input name="_token" type="hidden" value='.$csrf.'>
                                    <input name="_method" type="hidden" value="DELETE">
                            <a class="btn btn-info" href="/orders-show/'.$row->id.'"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-primary" href="/orders-edit/'.$row->id.'"><i class="fas fa-pencil-alt"></i></a>
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

    public function getOrders()
    {
        return Order::all();
    }

    public function storeOrder($data)
    {
        Order::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'status' => $data['status'],
        ]);
    }

    public function findOrder($id)
    {
        return Order::findOrFail($id);
    }

    public function updateOrder($data, $id)
    {
        $order = $this->findOrder($id);
        $order->name = $data['name'];
        $order->description = $data['description'];
        $order->status = $data['status'];
        $order->save();
    }

    public function destroyOrder($id)
    {
        $order = $this->findOrder($id);
        $order->delete();
    }
}

