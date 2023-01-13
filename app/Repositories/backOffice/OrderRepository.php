<?php

namespace App\Repositories\backOffice;

use App\Helpers\GuzzleHttpHelper;
use App\Mail\OrderMailStatusUpdated;
use App\Models\Event;
use App\Models\Order;
use App\Models\TrackingInfo;
use Illuminate\Support\Facades\Mail;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Yajra\DataTables\DataTables;

//use Your Model

/**
 * Class OrderRepository.
 */
class OrderRepository extends BaseRepository
{
    protected $order;
    protected $trackingInfoRepository;
    protected $guzzle;

    function __construct(Order $order, GuzzleHttpHelper $guzzle, TrackingInfoRepository $trackingInfoRepository)
    {
        $this->order = $order;
        $this->trackingInfoRepository = $trackingInfoRepository;
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
        foreach ($data as $key => $value) 
        {
            $order = Order::where(['order_type'=>'aymakan','tracking_number'=>$value['tracking_number']])->first();
            if ($order) 
            {
                if (count($order->trackings) < count($value['tracking_info'])) 
                {
                    foreach ($value['tracking_info'] as $k => $val) 
                    {
                        $tracking = TrackingInfo::where('status_code',$val['status_code'])->first();
                        $desc = $val['description'];
                        $descAr =  $val['description_ar'];
                        if (!$tracking) 
                        {
                            $tracking = $this->trackingInfoRepository::storeTrackingsInfos($order,'aymakan',$val['status_code'],$desc,$descAr,$val['created_at']);
                        }
                    }
                }
            }
            else
            {
                $newOrder = $this->storeOrder($value,'aymakan');
                foreach ($value['tracking_info'] as $k => $val) 
                {             
                    $desc = $val['description'];
                    $descAr =  $val['description_ar'];
                    $tracking = $this->trackingInfoRepository::storeTrackingsInfos($newOrder,'aymakan',$val['status_code'],$desc,$descAr,$val['created_at']);
                }
            }
        }
        return response()->json(['success'=>true]);
    }

    public function storeOrder($data, $type=null)
    {
        $order = Order::create([
            'reference' => $data['reference'],
            'tracking_number' => $data['tracking_number'],
            'customer_name' => $data['customer_name'],
            'requested_by' => $data['requested_by'],
            'cod_amount' => $data['cod_amount'],
            'declared_value' => $data['declared_value'],
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
            'is_insured' => $data['is_insured'],
            'status_label' => ($data['status_label'] ? $data['status_label'] : $data['status']),
            'reason_en' => ($data['reason_en'] ? $data['reason_en'] : NULL),
            'reason_ar' => ($data['reason_ar'] ? $data['reason_ar'] : NULL),
            'is_reverse_pickup' => ($data['is_reverse_pickup'] ? $data['is_reverse_pickup'] : 0 ),
            'is_prepaid' => ($data['is_prepaid'] ? $data['is_prepaid'] : 0),
            'payment_method' => $data['payment_method'],
            'order_type' =>($type ? $type : 'sparks'),
        ]);
        $this->trackingInfoRepository::storeTrackingsInfos($order,'sparks',$order->status,'','','');
        return $order;
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
            Mail::to($order->collection_email)->send(new OrderMailStatusUpdated($order));
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

