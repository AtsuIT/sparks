<?php

namespace App\Console\Commands;

use App\Mail\OrderMail;
use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MailCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $orders = Order::where('order_type','aymakan')->with('events','trackings')->get();
        foreach ($orders as $key => $order) 
        {
            Mail::to($order->collection_email)->send(new OrderMail($order));
        }
    }
}
