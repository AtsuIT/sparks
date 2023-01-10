<?php

namespace App\Observers;

use App\Mail\OrderMail;
use App\Models\Event;
use App\Models\Order;
use App\Models\TrackingInfo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class OrderObserver
{
    
    function generateUuid($longueur = 10)
    {
        $caracteres = '0123456789';
        $longueurMax = strlen($caracteres);
        $chaineAleatoire = 'SP-';
        for ($i = 0; $i < $longueur; $i++)
        {
        $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
        }
        return $chaineAleatoire;
    }

    function generateTrackingNumber($longueur = 10)
    {
        $caracteres = '0123456789';
        $longueurMax = strlen($caracteres);
        $chaineAleatoire = 'AY-';
        for ($i = 0; $i < $longueur; $i++)
        {
        $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
        }
        return $chaineAleatoire;
    }
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        $order->uuid = $this->generateUuid(10);
        // $order->tracking_number = $this->generateTrackingNumber(10);
        $order->save();
        Mail::to($order->delivery_email)->send(new OrderMail($order));
        Event::create([
            'name' => $order->customer_name,
            'start_date' => Carbon::parse($order->submission_date)->format('Y-m-d'),
            'color' => 'bg-success',
            'order_id' => $order->id,
        ]);
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        if ($order->status == "Returned") {
            TrackingInfo::create([
                'status_code' => $order->status,
                'description' => "Shipment is returned to shipper",
                'description_ar' => "تم إرجاع الشحنة للشاحن",
                'order_id' => $order->id,
            ]);
        }
        else if ($order->status == "Delivered") {
            TrackingInfo::create([
                'status_code' => $order->status,
                'description' => "Shipment is Delivered to client",
                'description_ar' => "تم تسليم الشحنة للعميل",
                'order_id' => $order->id,
            ]);
        }
        else if ($order->status == "Pickup Delivered") {
            TrackingInfo::create([
                'status_code' => $order->status,
                'description' => "Shipment is out for its final destination.",
                'description_ar' => "الشحنة خارجة للتوصيل للوجة النهائية",
                'order_id' => $order->id,
            ]);
        }
        else if ($order->status == "Pickup Cancelled") {
            TrackingInfo::create([
                'status_code' => $order->status,
                'description' => "Shipment is pickup cancel by sparks",
                'description_ar' => "الشركة تلغي الشحنة",
                'order_id' => $order->id,
            ]);
        }
        
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
