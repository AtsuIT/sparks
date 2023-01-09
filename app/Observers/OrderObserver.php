<?php

namespace App\Observers;

use App\Models\Event;
use App\Models\Order;
use Carbon\Carbon;

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
        //
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
