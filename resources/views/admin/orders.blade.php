@extends("layouts.admin")
@section("content")
    <div class="container-fluid mt-3">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <td>Order ID</td>
                <td>Customer</td>
                <td>Clinic</td>
                <td>Item QTY</td>
                <td>Grand Total</td>
                <td>Status</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>
                        @if($order->user_id > 0)
                            {{App\User::where('id', $order->user_id)->get()->first()->name}}
                        @else
                            Unknown
                        @endif
                    </td>
                    <td>{{App\Clinic::where('id', $order->clinic_id)->get()->first()->name}}</td>
                    <td>{{$order->item_count}}</td>
                    <td>£{{$order->total}}</td>
                    <td>
                        @if($order->status == "DECLINED")
                            @if($order->reason == "POTENTIAL_FRAUD")
                                <span class="fa-stack {{$order->reason}}" data-toggle="tooltip" title="The customer failed our fraud checks." data-placement="top">
                                  <i class="fa fa-circle fa-stack-2x"></i>
                                  <i class="fa fa-info fa-stack-1x fa-inverse"></i>
                                </span>
                            @elseif($order->reason == "UNAFFORDABLE")
                                <span class="fa-stack {{$order->reason}}" data-toggle="tooltip" title="The customer did not meet our affordability criteria." data-placement="top">
                                  <i class="fa fa-circle fa-stack-2x"></i>
                                  <i class="fa fa-info fa-stack-1x fa-inverse"></i>
                                </span>
                            @else
                                <span class="fa-stack {{$order->reason}}" data-toggle="tooltip" title="A reason has not been captured.." data-placement="top">
                                  <i class="fa fa-circle fa-stack-2x"></i>
                                  <i class="fa fa-info fa-stack-1x fa-inverse"></i>
                                </span>
                            @endif
                        @endif
                        {{$order->status}}
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#modal{{$order->id}}">View Order</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row align-items-end">
            <div class="col-12">
                {{ $orders->links() }}
            </div>
        </div>

        <!-- Only used for modals -->
        @foreach ($orders as $order)
            <div class="modal fade" tabindex="-1" role="dialog" id="modal{{$order->id}}">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title w-100">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Order details for order #{{$order->id}} - <small class="text-muted">{{date("D j M, Y @ h:ia", strtotime($order->created_at))}}</small></h4>
                            </div>
                        </div>
                        <div class="modal-body">
                            <table class="table table-striped">
                                <tr>
                                    <td class="p-1">Name</td>
                                    <td class="p-1">
                                        @if($order->user_id > 0)
                                            {{App\User::find($order->user_id)->name}}
                                        @else
                                            Unknown
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-1">Email</td>
                                    <td class="p-1">
                                        @if($order->user_id > 0)
                                            {{App\User::find($order->user_id)->email}}
                                        @else
                                            Unknown
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-1">Tel:</td>
                                    <td class="p-1">
                                        @if($order->user_id > 0)
                                            {{App\User::find($order->user_id)->telephone}}
                                        @else
                                            Unknown
                                        @endif
                                    </td>
                                </tr>
                            </table>
                            <table class="table table-hover table-striped {{$order->id}}">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->orderItems as $orderItem)
                                    <tr>
                                        @if($orderItem->product_id)
                                            <td>
                                                @if(App\Service::find($orderItem->product_id))
                                                    {{App\Service::find($orderItem->product_id)->name}}<br>
                                                    @if(array_key_exists('option', get_object_vars($orderItem))))
                                                    <small>{{$orderItem->option}}</small>
                                                    @endif
                                                @else
                                                    Product has been deleted.
                                                @endif
                                            </td>
                                            <td>{{$orderItem->quantity}}</td>
                                            <td>£{{$orderItem->price}}</td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <?php if(isset($_GET['customer'])): ?>
        <script>
            $(document).ready(function(){
                $('.data-table').dataTable({
                    "order": [[ 0, "desc" ]],
                    "search": {
                        "search": <?php echo $_GET['customer']; ?>
                    }
                });
            })
        </script>
        <?php endif; ?>
    </div>
@endsection