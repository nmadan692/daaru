@extends('front.layouts.master')
@section('content')
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('front')}}/img/daaruu.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Daaruu Dot Com</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home')}}">Home</a>
                            <span>My Orders</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Ordered Date</th>
                                <th>Product</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($orders as $key => $order)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        @foreach($order->products as $product)
                                            {{ $product->name }}
                                            <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if(\App\Daaruu\Constants\OrderConstant::ORDERED_ID)
                                            <span class="label label-primary">Pending</span>
                                        @elseif(\App\Daaruu\Constants\OrderConstant::SUCCEED_ID)
                                            <span class="label label-success">Delivered</span>
                                        @elseif(\App\Daaruu\Constants\OrderConstant::CANCELED_ID)
                                            <span class="label label-danger">Canceled</span>
                                        @endif
                                    </td>
                                    <td>
                                        <?php
                                        $amount = 0;
                                        ?>
                                        @foreach ($order->products as $product)
                                            <span style="display: none">{{ $amount+= $product->pivot->amount }}</span>
                                        @endforeach
                                        {{ 'Nrs '. $amount }}

                                    </td>
                                    <td>
                                        <a href="{{ route('my-order.invoice.view', encrypt($order->id)) }}"><i class="view-pdf fa fa-eye"></i></a>
{{--                                        <a href="{{ route('my-order.invoice.download', encrypt($order->id)) }}" target="_blank"><i class="download-pdf fa fa-download"></i></a>--}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No orders has been placed yet.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            var message = @json(session()->get('message'));
            var status = @json(session()->get('status')) ?? 'success';
            if (message) {
                if(status == 'success') {
                    toastr.success(message);
                }
                else if(status == 'error') {
                    toastr.error(message);
                }
            }
        });
    </script>
@endpush
