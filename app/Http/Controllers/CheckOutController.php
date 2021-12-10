<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Mail\OrderPlaced;
use Illuminate\Support\Str;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CheckOutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Cart::instance('default')->count() == 0){
            return redirect()->route('shop.index');
        }

        if(auth()->user() && request()->is('guestCheckout')) {
            return redirect()->route('checkout.index');
        }

        return view('checkout');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckOutRequest $request)
    {
        $contents = Cart::content()->map(function($item){
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();
         try {
           $charge = Stripe::charges()->create([
                'amount' => Cart::total(),
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' => [
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count(),
                ]
           ]);

          $order = $this->addToOrdersTable($request, null);

           Mail::send(new OrderPlaced($order->id));

           Cart::instance('default')->destroy();

           return redirect()->route('confirmation.index')->with('status', 'Thanks You!Your card has been successfully accepted..');

         } catch (CardErrorException $e) {
            $this->addToOrdersTable($request, $e->getMessage());
            
            return back()->with('errors' . $e->getMessage());
         }
    }

    /**
     *  Create 2c2p paymentRequest
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    protected function addToOrdersTable($request, $error)
    {
           // insert into orders table
           $order = Order::create([
                'user_id' => auth()->user() ? auth()->user()->id : null,
                'billing_email' => $request->email,
                'billing_name' => $request->name,
                'billing_address' => $request->address,
                'billing_city' => $request->city,
                'billing_state' => $request->state,
                'billing_postalcode' => $request->postalcode,
                'billing_phone' => $request->phone,
                'billing_name_on_card' => $request->name,
                'billing_subtotal' => Cart::subtotal(),
                'billing_tax' => Cart::tax(),
                'billing_total' => Cart::total(),
                'error' => $error,
           ]);
           // insert into order_product table
           foreach(Cart::content() as $item){
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item->model->id,
                    'quantity' => $item->qty,
                ]);
           }

           return $order;
    }
}
