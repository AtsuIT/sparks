<?php

namespace App\Http\Controllers\backOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Services\backOffice\EventService;
use App\Services\backOffice\OrderService;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $eventService;
    protected $orderService;
    
    function __construct(EventService $eventService, OrderService $orderService)
    {
        $this->eventService = $eventService;
        $this->orderService = $orderService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = $this->eventService->getEvents();
        $orders = $this->orderService->getOrders();
        return view('events.events',compact('events','orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $this->eventService->storeEvent($request);
        return response()->json(['code'=>200,'data'=>$this->eventService->getEvents()]);
        // return redirect()->route('events')->with('success','Event created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id)
    {
        $this->eventService->updateEvent($request,$id);
        return response()->json(['code'=>200,'data'=>$this->eventService->getEvents()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->eventService->destroyEvent($id);
        return response()->json(['code'=>200,'data'=>$this->eventService->getEvents()]);
    }
}
