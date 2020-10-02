<?php

namespace App\Http\Controllers;


use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Provinces;
use App\Regencies;

class OrderController extends Controller
{
    /**
     * Ship the given order.
     *
     * @param  Request  $request
     * @param  int  $orderId
     * @return Response
     */
    public function ship($orderId)
    {
        $order = Regencies::findOrFail($orderId);
$request='ebuka4u96@gmail.com'

        Mail::to($request->user->send(new OrderShipped($order));
    }


}

