<p>Hi, {{$order->delivery_name}}</p>
<p>The order {{$order->uuid}} status has been updated </p>
<span>The new status is : {{$order->status}}</span>
<p>This is url for tracking the order <a href="{{route('tracking-order')}}">Tracking Order</a></p>