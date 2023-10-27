@extends('layouts.frontend')
@section('content')
    <div class="container">
        @if (Cart::count() > 0)
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
                    @foreach (Cart::content() as $row)
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
                                {{ $row->name }}
                                <div class="row">
                                    <div class="col-12">
                                        <small class="muted-text"><strong>Option:
                                            </strong>{{ $row->options->option }}</small>
                                    </div>
                                    <div class="col-12">
                                        <small class="muted-text"><strong>Clinic:
                                            </strong>{{ App\Clinic::where('id', $row->options->clinic)->first()->name }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center d-none d-md-table-cell">£{{ $row->price }}</td>
                            <td class="text-center">{{ $row->qty }}</td>
                            <td class="text-center">£{{ $row->subtotal }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="d-none d-md-table-cell"></td>
                        <td></td>
                        <td class="d-none d-md-table-cell"></td>
                        <td class="text-center">Sub Total:</td>
                        <td class="text-center">£{{ Cart::subtotal() }}</td>
                    </tr>
                    <tr>
                        <td class="d-none d-md-table-cell"></td>
                        <td></td>
                        <td class="d-none d-md-table-cell"></td>
                        <td class="text-center">Grand Total:</td>
                        <td class="text-center">£{{ Cart::subtotal() }}</td>
                    </tr>
                </tbody>
            </table>

            <?php $sub_total = str_replace(',', '', Cart::subtotal()); ?>

            @if ($sub_total >= 250)
                <div class="row mb-3">
                    <div class="col-12 d-block d-md-flex">
                        <a href="/clinics/{{ $row->options->clinic }}" class="btn btn-primary mr-auto btn-block-sm">Continue
                            Shopping</a>
                        <a href="/basket/empty" class="btn btn-primary mr-0 mr-md-2 btn-block-sm"><i
                                class="fa fa-trash mr-2"></i> Empty Basket</a>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#checkoutModal">CHECKOUT</a>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            To apply for finance, the order total must exceed £250.
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 d-block d-md-flex">
                        <a href="/clinics/{{ $row->options->clinic }}" class="btn btn-primary mr-auto btn-block-sm">Continue
                            Shopping</a>
                        <a href="/basket/empty" class="btn btn-primary mr-0 mr-md-2 btn-block-sm"><i
                                class="fa fa-trash mr-2"></i> Empty Basket</a>
                    </div>
                </div>
            @endif
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

    <!-- Modal -->
    <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">IMPORTANT INFORMATION:</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="color: #212529">
                    <p>This is only an acceptance, not a confirmed signed agreement. Please note the practitioner cannot
                        perform any treatments until your deposit has been paid & agreement has been signed.
                        You MUST call Cosmetic Finance Group on <a href="tel:+441613886107">0161 388 6107</a> once your loan
                        is
                        approved in order to fully complete the application (office opening hours: Monday to Friday 9am-5pm)
                        *We recommend only booking your appointment with the practitioner once this is done and your deposit
                        has been paid and agreement signed*
                    </p><br>

                    <p>You will now be re-directed to our lender partner SNAP finance.</p><br>

                    <p>If your loan application is successful. Upon completion the lender will pay us a commission. This
                        does
                        not affect the price you pay in any way.</p> <br>

                    <p>Please confirm you have read and understood the above.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="/checkout" class="btn btn-primary">Confirm &amp; Continue</a>
                </div>
            </div>
        </div>
    </div>

@endsection
