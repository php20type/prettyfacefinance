@extends("layouts.frontend")
@section("content")
    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="border-bottom pb-2">Order Dashboard</h1>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
                <div class="card border-0 rounded-0">
                    <div class="card-body text-center">
                        <p>Total Revenue</p>
                        <p>£{{$clinic->orders->where('status', 'ACCEPTED')->sum('total')}}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
                <div class="card border-0 rounded-0">
                    <div class="card-body text-center">
                        <p>Total Orders</p>
                        <p>{{$clinic->orders->where('status', 'ACCEPTED')->count()}}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
                <div class="card border-0 rounded-0">
                    <div class="card-body text-center">
                        <p>Revenue This Month</p>
                        <p>£{{$clinic->orders->where('status', 'ACCEPTED')->where('created_at', '>=', Carbon\Carbon::now()->subMonth())->sum('total')}}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
                <div class="card border-0 rounded-0">
                    <div class="card-body text-center">
                        <p>Orders This Month</p>
                        <p>{{$clinic->orders->where('status', 'ACCEPTED')->where('created_at', '>=', Carbon\Carbon::now()->subMonth())->count()}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Order Date</th>
                <th>Order ID</th>
                <th>Status</th>
                <th>Customer</th>
                <th>Grand Total</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($clinic->orders->where('status', 'ACCEPTED') as $order)
                <tr>
                    <td class="align-middle">{{date("D j M, Y @ h:ia", strtotime($order->created_at))}}</td>
                    <td class="align-middle">{{$order->id}}</td>
                    <td class="align-middle">{{$order->status}}</td>
                    <td class="align-middle">
                        @if($order->user_id)
                            {{App\User::where('id', $order->user_id)->first()->name}}
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="align-middle">£{{$order->total}}</td>
                    <td class="align-middle">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#order_{{$order->id}}">View Items</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @foreach($clinic->orders->where('status', 'ACCEPTED') as $order)
        <div class="modal fade" id="order_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Order #{{$order->id}} - Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row pb-2">
                            <div class="col-4"><strong>Date</strong>:</div>
                            <div class="col-8">{{date("D j M, Y @ h:ia", strtotime($order->created_at))}}</div>
                        </div>
                        @if($order->user_id)
                            <div class="row pb-2">
                                <div class="col-4"><strong>Customer</strong>:</div>
                                <div class="col-8">{{App\User::where('id', $order->user_id)->first()->name}}</div>
                            </div>
                        @endif

                        <table class="table table-striped table-hover mt-3">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->orderItems as $orderItem)
                                <tr>
                                    <td>
                                        @if(App\Service::where('id', $orderItem->product_id)->first())
                                            {{App\Service::where('id', $orderItem->product_id)->first()->name}}<br>
                                            @if(isset($orderItem->option))
                                                <small class="text-muted">{{$orderItem->option}}</small>
                                            @endif
                                        @else
                                            Product Deleted
                                        @endif
                                    </td>
                                    <td>{{$orderItem->quantity}}</td>
                                    <td>£{{$orderItem->price}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection