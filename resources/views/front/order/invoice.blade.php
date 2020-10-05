@extends('front.layouts.master')
@section('content')
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
        <div class="card">
            <div class="card-body">
                <div class="mt-1">
                    <img src="{{ getImageUrl($setting[0]->logo ?? null ) }}" alt="" height="100px;" width="200px;">
                    <div class="float-right display-block text-right">
                        <span class="mb-0">Invoice Number : <strong>{{ $order->invoice_number }}</strong></span>
                        <span class="mb-0">Invoice Date : <strong>{{ $order->created_at }}</strong></span>
                        <span class="mb-0">Payment Status : <strong>{{ $order->pay_status }}</strong></span>
                    </div>
                </div>

                <div class="row mb-4 mt-4">
                    <div class="col-sm-6">
                        <div class="display-block">
                            <span><strong>From :</strong></span>
                            <span>{{ $setting[0]->name ?? null }}</span>
                            <span>{{ $setting[0]->address ?? null }}</span>
                            <span>{{ $setting[0]->email ?? null}}</span>
                            <span>{{ $setting[0]->phone ?? null }}</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-right text-right display-block">
                            <span><strong>To : </strong></span>
                            <span>{{ $user->full_name }}</span>
                            <span>{{ $user->address1.($user->address2) ? (', '. $user->address2) : null}}</span>
                            <span>{{ $user->email }}</span>
                            <span>{{ $user->phone }}</span>
                        </div>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="center">S.N</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th class="right">Price</th>
                            <th class="right">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $subTotal= 0;
                        @endphp

                        @foreach($order->products as $key => $product)
                            @php
                                $subTotal+= $product->pivot->amount;
                            @endphp
                            <tr>
                                <td class="center">{{ $key+1 }}</td>
                                <td class="left strong">{{ $product->name }}</td>
                                <td class="center">{{ $product->pivot->quantity }}</td>
                                <td class="right">{{ 'Nrs '.$product->discount_amount }}</td>
                                <td class="right">{{ 'Nrs '.$product->pivot->amount }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                            <tr>
                                <td class="left">
                                    <strong class="text-dark">Total</strong>
                                </td>
                                <td class="right"><strong>{{ 'Nrs '. $subTotal }} </strong></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
