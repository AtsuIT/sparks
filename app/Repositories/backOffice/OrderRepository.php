<?php

namespace App\Repositories\backOffice;

use App\Helpers\GuzzleHttpHelper;
use App\Mail\OrderMailStatusUpdated;
use App\Models\Event;
use App\Models\Order;
use App\Models\TrackingInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Yajra\DataTables\DataTables;

//use Your Model

/**
 * Class OrderRepository.
 */
class OrderRepository extends BaseRepository
{
    protected $order;
    protected $guzzle;

    function __construct(Order $order, GuzzleHttpHelper $guzzle)
    {
        $this->order = $order;
        $this->guzzle = $guzzle;
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
        return Order::with('trackings','events')->get();
    }

    public function storeOrderByApi()
    {
        $data = $this->guzzle::shipmentByReference();
        Schema::disableForeignKeyConstraints();
        DB::table('events')->truncate();
        DB::table('tracking_infos')->truncate();
        DB::table('orders')->truncate();
        Schema::enableForeignKeyConstraints();
        foreach($data as $key=> $value)
        {
            $order = Order::create([
                'reference' => $value['reference'],
                'tracking_number' => $value['tracking_number'],
                'customer_name' => $value['customer_name'],
                'requested_by' => $value['requested_by'],
                'cod_amount' => $value['cod_amount'],
                'declared_value' => $value['declared_value'],
                'currency' => $value['currency'],
                'delivery_name' => $value['delivery_name'],
                'delivery_email' => $value['delivery_email'],
                'delivery_city' => $value['delivery_city'],
                'delivery_address' => $value['delivery_address'],
                'delivery_neighbourhood' => $value['delivery_neighbourhood'],
                'delivery_postcode' => $value['delivery_postcode'],
                'delivery_country' => $value['delivery_country'],
                'delivery_phone' => $value['delivery_phone'],
                'delivery_description' => $value['delivery_description'],
                'collection_name' => $value['collection_name'],
                'collection_email' => $value['collection_email'],
                'collection_city' => $value['collection_city'],
                'collection_address' => $value['collection_address'],
                'collection_postcode' => $value['collection_postcode'],
                'collection_country' => $value['collection_country'],
                'collection_phone' => $value['collection_phone'],
                'collection_description' => $value['collection_description'],
                'submission_date' => $value['submission_date'],
                'pickup_date' => $value['pickup_date'],
                'received_at' => $value['received_at'],
                'delivery_date' => $value['delivery_date'],
                'weight' => $value['weight'],
                'pieces' => $value['pieces'],
                'items_count' => $value['items_count'],
                'status' => $value['status'],
                'status_label' => $value['status_label'],
                'reason_en' => $value['reason_en'],
                'reason_ar' => $value['reason_ar'],
                'is_reverse_pickup' => $value['is_reverse_pickup'],
                'is_insured' => $value['is_insured'],
                'is_prepaid' => $value['is_prepaid'],
                'payment_method' => $value['payment_method'],
                'order_type' => 'aymakan',
            ]);
            foreach ($value['tracking_info'] as $k => $val) 
            {
                TrackingInfo::create([
                    'status_code' => $val['status_code'],
                    'description' => $val['description'],
                    'description_ar' => $val['description_ar'],
                    'order_id' => $order->id,
                    'created_at' => $val['created_at'],
                ]);
            }
        }
        return response()->json(['success'=>true]);
    }

    public function storeOrder($data)
    {
        $order = array(
            'customer_name' => $data['customer_name'],
            'requested_by' => $data['requested_by'],
            'declared_value' => $data['declared_value'],
            'declared_value_currency' => $data['declared_value_currency'],
            'is_cod' => $data['is_cod'],
            'cod_amount' => $data['cod_amount'],
            'currency' => $data['currency'],
            'delivery_name' => $data['delivery_name'],
            'delivery_email' => $data['delivery_email'],
            'delivery_city' => $data['delivery_city'],
            'delivery_address' => $data['delivery_address'],
            'delivery_neighbourhood' => $data['delivery_neighbourhood'],
            'delivery_postcode' => $data['delivery_postcode'],
            'delivery_country' => $data['delivery_country'],
            'delivery_phone' => $data['delivery_phone'],
            'delivery_description' => $data['delivery_description'],
            'collection_name' => $data['collection_name'],
            'collection_email' => $data['collection_email'],
            'collection_city' => $data['collection_city'],
            'collection_address' => $data['collection_address'],
            'collection_postcode' => $data['collection_postcode'],
            'collection_country' => $data['collection_country'],
            'collection_phone' => $data['collection_phone'],
            'collection_description' => $data['collection_description'],
            'submission_date' => $data['submission_date'],
            'pickup_date' => $data['pickup_date'],
            'received_at' => $data['received_at'],
            'delivery_date' => $data['delivery_date'],
            'weight' => $data['weight'],
            'pieces' => $data['pieces'],
            'items_count' => $data['items_count'],
            'status' => $data['status'],
            'status_label' => $data['status'],
            'is_insured' => $data['is_insured'],
            'is_reverse_pickup' => 0,
            'is_prepaid' => 0,
            'payment_method' => $data['payment_method'],
            'shipment_company' => $data['shipment_company'],
            'order_type' => 'sparks',
        );
        $order = Order::create($order);
        TrackingInfo::create([
            'status_code' => $order->status,
            'description' => "Shipment is created at collection point",
            'description_ar' => "تم إصدار بوليصة شحن لدى الشركة الشاحنة لكن لم تستلم من قبل \"أي مكان \"",
            'order_id' => $order->id,
        ]);
        // $client = $this->guzzle::setAuth();
        // $orderShipment = array(
        //     "declared_value_currency"=> "SAR",
        //     "reference"=> "",
        //     "is_cod"=> 1,
        //     'customer_name' => $data['customer_name'],
        //     'requested_by' => $data['requested_by'],
        //     'cod_amount' => $data['cod_amount'],
        //     'declared_value' => $data['declared_value'],
        //     'currency' => $data['currency'],
        //     'delivery_name' => $data['delivery_name'],
        //     'delivery_email' => $data['delivery_email'],
        //     'delivery_city' => $data['delivery_city'],
        //     'delivery_address' => $data['delivery_address'],
        //     'delivery_neighbourhood' => $data['delivery_neighbourhood'],
        //     'delivery_postcode' => $data['delivery_postcode'],
        //     'delivery_country' => $data['delivery_country'],
        //     'delivery_phone' => $data['delivery_phone'],
        //     'delivery_description' => $data['delivery_description'],
        //     'collection_name' => $data['collection_name'],
        //     'collection_email' => $data['collection_email'],
        //     'collection_city' => $data['collection_city'],
        //     'collection_address' => $data['collection_address'],
        //     'collection_postcode' => $data['collection_postcode'],
        //     'collection_country' => $data['collection_country'],
        //     'collection_phone' => $data['collection_phone'],
        //     'collection_description' => $data['collection_description'],
        //     'weight' => $data['weight'],
        //     'pieces' => $data['pieces'],
        //     'items_count' => $data['items_count'],
        //     // 'submission_date' => $data['submission_date'],
        //     // 'pickup_date' => $data['pickup_date'],
        //     // 'received_at' => $data['received_at'],
        //     // 'delivery_date' => $data['delivery_date'],
        //     // 'status' => $data['status'],
        //     // 'status_label' => $data['status_label'],
        //     // 'reason_en' => $data['reason_en'],
        //     // 'reason_ar' => $data['reason_ar'],
        //     // 'is_reverse_pickup' => $data['is_reverse_pickup'],
        //     // 'is_insured' => $data['is_insured'],
        //     // 'is_prepaid' => $data['is_prepaid'],
        //     // 'payment_method' => $data['payment_method']
        // );
        // $client->createShipment($orderShipment);
    }

    public function findOrder($id)
    {
        return Order::where('id',$id)->with('trackings','events')->first();
    }

    public function updateOrder($data, $id)
    {
        $order = $this->findOrder($id);
        $status = $order->status;
        $orderData = array(
            'customer_name' => $data['customer_name'],
            'requested_by' => $data['requested_by'],
            'declared_value' => $data['declared_value'],
            'declared_value_currency' => $data['declared_value_currency'],
            'is_cod' => $data['is_cod'],
            'cod_amount' => $data['cod_amount'],
            'currency' => $data['currency'],
            'delivery_name' => $data['delivery_name'],
            'delivery_email' => $data['delivery_email'],
            'delivery_city' => $data['delivery_city'],
            'delivery_address' => $data['delivery_address'],
            'delivery_neighbourhood' => $data['delivery_neighbourhood'],
            'delivery_postcode' => $data['delivery_postcode'],
            'delivery_country' => $data['delivery_country'],
            'delivery_phone' => $data['delivery_phone'],
            'delivery_description' => $data['delivery_description'],
            'collection_name' => $data['collection_name'],
            'collection_email' => $data['collection_email'],
            'collection_city' => $data['collection_city'],
            'collection_address' => $data['collection_address'],
            'collection_postcode' => $data['collection_postcode'],
            'collection_country' => $data['collection_country'],
            'collection_phone' => $data['collection_phone'],
            'collection_description' => $data['collection_description'],
            'submission_date' => $data['submission_date'],
            'pickup_date' => $data['pickup_date'],
            'received_at' => $data['received_at'],
            'delivery_date' => $data['delivery_date'],
            'weight' => $data['weight'],
            'pieces' => $data['pieces'],
            'items_count' => $data['items_count'],
            'status' => $data['status'],
            'status_label' => $data['status'],
            'is_insured' => $data['is_insured'],
            'is_reverse_pickup' => 0,
            'is_prepaid' => 0,
            'payment_method' => $data['payment_method'],
            'shipment_company' => $data['shipment_company'],
        );
        $order->update($orderData);
        if ($order->status != $status) {
            Mail::to($order->delivery_email)->send(new OrderMailStatusUpdated($order));
        }
    }

    public function destroyOrder($id)
    {
        $order = $this->findOrder($id);
        Event::where('order_id',$order->id)->delete();
        // $client = $this->guzzle::setAuth();
        // $client->cancelShipment(['tracking' => $order->tracking_number]);
        $order->delete();
    }
}

