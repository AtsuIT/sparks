<?php

namespace App\Repositories\backOffice;

use App\Models\Order;
use App\Models\TrackingInfo;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

//use Your Model

/**
 * Class TrackingInfoRepository.
 */
class TrackingInfoRepository extends BaseRepository
{
    protected $tracking;
    protected $guzzle;

    function __construct(TrackingInfo $tracking)
    {
        $this->tracking = $tracking;
    }
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return TrackingInfo::class;
    }

    public static function storeTrackingsInfos($order,$type,$status,$desc,$descAr,$created_at)
    {
        if ($type =="sparks") 
        {
            TrackingInfo::create([
                'status_code' => $status,
                'description' => "Shipment is created at collection point",
                'description_ar' => "تم إصدار بوليصة شحن لدى الشركة الشاحنة لكن لم تستلم من قبل \"أي مكان \"",
                'order_id' => $order->id,
            ]);
        }
        else
        {
            TrackingInfo::create([
                'status_code' => $status,
                'description' => $desc,
                'description_ar' => $descAr,
                'order_id' => $order->id,
                'created_at' => $created_at,
            ]);
        }
        
    }

}


