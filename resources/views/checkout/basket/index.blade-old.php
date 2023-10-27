@extends("layouts.frontend")
@section("content")
    <div class="container">
        @if(Cart::count() > 0)
            <table class="table table-striped my-3">
                <thead>
                    <tr>
                        <th class="border-bottom-0 d-none d-md-table-cell"></th>
                        <th class="border-bottom-0">Product</th>
                        <th class="border-bottom-0 d-none d-md-table-cell text-center">Price</th>
                        <th class="border-bottom-0 text-center">Quantity</th>
                        <th class="border-bottom-0 text-center">Total</th>
                    </tr>
                </thead>
                <tbody>
                @foreach(Cart::content() as $row)
                    <tr>
                        <td class="align-middle text-center d-none d-md-table-cell">
                            {!! Form::open(['route' => 'basket.remove', 'method' => 'post']) !!}
                                {!! Form::hidden('rowid', $row->rowId) !!}
                                <button class="btn btn-dark btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            {!! Form::close() !!}
                        </td>
                        <td>
                            {{$row->name}}
                            <div class="row">
                                <div class="col-12">
                                    <small class="muted-text"><strong>Option: </strong>{{$row->options->option}}</small>
                                </div>
                                <div class="col-12">
                                    <small class="muted-text"><strong>Clinic: </strong>{{App\Clinic::where('id', $row->options->clinic)->first()->name}}</small>
                                </div>
                            </div>
                        </td>
                        <td class="text-center d-none d-md-table-cell">£{{$row->price}}</td>
                        <td class="text-center">{{$row->qty}}</td>
                        <td class="text-center">£{{$row->subtotal}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td class="d-none d-md-table-cell"></td>
                    <td></td>
                    <td class="d-none d-md-table-cell"></td>
                    <td class="text-center">Sub Total:</td>
                    <td class="text-center">£{{Cart::subtotal()}}</td>
                </tr>
                <tr>
                    <td class="d-none d-md-table-cell"></td>
                    <td></td>
                    <td class="d-none d-md-table-cell"></td>
                    <td class="text-center">Grand Total:</td>
                    <td class="text-center">£{{Cart::subtotal()}}</td>
                </tr>
                </tbody>
            </table>

            <?php $sub_total = str_replace(",", "", Cart::subtotal()); ?>

            @if($sub_total <= 45)
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                           To apply for finance, the order total must exceed £45.
                        </div>
                    </div>
                </div>
            @endif

            <div class="row mb-3">
                <div class="col-12 d-block d-md-flex">
                    <a href="/clinics/{{$row->options->clinic}}" class="btn btn-primary mr-auto btn-block-sm">Continue Shopping</a>
                    <a href="/basket/empty" class="btn btn-primary mr-0 mr-md-2 btn-block-sm"><i class="fa fa-trash mr-2"></i> Empty Basket</a>

                    @if($sub_total <= 45)
                        <a href="javascript:void(0);" class="btn btn-primary disabled btn-block-sm"><i class="fa fa-check mr-2"></i> APPLY NOW </a>
                    @else
                        <a href="/checkout" class="btn btn-primary btn-block-sm"><i class="fa fa-check mr-2"></i> APPLY NOW </a>
                    @endif
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">
                        <i class="fa fa-shopping-basket my-3 mr-2"></i> Your Shopping Basket is Empty
                    </h1>
                    <p class="text-center mb-3">
                        <a href="/clinics">Continue Shopping</a>
                    </p>
                </div>
            </div>
        @endif
    </div>
@endsection
