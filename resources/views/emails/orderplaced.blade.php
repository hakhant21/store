@component('mail::message')
# Order Received

Thanks you for your order.

**Order ID:** {{ $order->id }}

**Order Email:** {{ $order->billing_email }}

**Order Name:** {{ $order->billing_name }}

##Items Orderd

@foreach($order->products as $product)
Name: {{ $product->name }} <br>
Price: {{ round($product->price / 100, 2) }} <br>
Quantity: {{ $product->pivot->quantity  }} <br> <hr>
@endforeach

**Order Subtotal:** {{ round($order->billing_subtotal / 100, 2) }}

**Order Tax:** {{ round($order->billing_tax / 100, 2) }}

**Order Total:** {{ round($order->billing_total / 100, 2) }}

You can read more information about your orders by logging into our website

@component('mail::button', ['url' => config('app.url')])
Go to Website
@endcomponent

Thanks you again for choosing us,<br>
{{ config('app.name') }}
@endcomponent
