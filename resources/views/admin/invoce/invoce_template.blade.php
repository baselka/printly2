   <!-- invoice functionality start -->
   <section class="invoice-print mb-1">
    <div class="row">

        {{-- <fieldset class="col-12 col-md-5 mb-1 mb-md-0">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Email" aria-describedby="button-addon2">
                <div class="input-group-append" id="button-addon2">
                    <button class="btn btn-outline-primary" type="button">Send Invoice</button>
                </div>
            </div>
        </fieldset> --}}
        <div class="col-12 col-md-7 d-flex flex-column flex-md-row justify-content-end">
            <button class="btn btn-primary btn-print mb-1 mb-md-0"> <i class="feather icon-file-text"></i> طباعة</button>
        </div>
    </div>
</section>
<!-- invoice functionality end -->
<!-- invoice page -->
<section class="card invoice-page">
    <div id="invoice-template" class="card-body">
        <!-- Invoice Company Details -->
        <div id="invoice-company-details" class="row">
            <div class="col-sm-6 col-12 text-left pt-1">
                <div class="media pt-1">
                    <img width="150px" height="100px" src="{{URL::to('/')}}/app-assets/images/logo/logo.png" alt="company logo" />
                </div>
            </div>
            <div class="col-sm-6 col-12 text-right">
                <h1>فاتورة</h1>
                <div class="invoice-details mt-2">
                    <h6>رقم الفاتورة</h6>
                    <p>{{$invoce->id}}</p>
                    <h6 class="mt-2">تاريخ الفاتورة</h6>
                    <p>{{$invoce->created_at}}</p>
                </div>
            </div>
        </div>
        <!--/ Invoice Company Details -->

        <!-- Invoice Recipient Details -->
        <div id="invoice-customer-details" class="row pt-2">
            <div class="col-sm-6 col-12 text-left">
                <h5>المستلم</h5>
                <div class="recipient-info my-2">
                    <p>{{App\Http\Controllers\ProfileController::get_user_info($invoce->user_id)->name}}</p>
                    <p>{{App\Http\Controllers\OrderController::get_address_ind($invoce->address)["city"]}}</p>
                    <p>{{App\Http\Controllers\OrderController::get_address_ind($invoce->address)["area"]}}</p>
                    <p>{{App\Http\Controllers\OrderController::get_address_ind($invoce->address)["street"]}}</p>
                </div>
                <div class="recipient-contact pb-2">
                    <p>
                        <i class="feather icon-mail"></i>
                        {{App\Http\Controllers\ProfileController::get_user_info($invoce->user_id)->email}}                    </p>
                    <p>
                        <i class="feather icon-phone"></i>
                         {{App\Http\Controllers\ProfileController::get_user_info($invoce->user_id)->phone}}
                    </p>
                </div>
            </div>
            <div class="col-sm-6 col-12 text-right">
                <h5>{{$setting->name}}.</h5>
                <div class="company-info my-2">
                    <p>{{$setting->city}}</p>
                    <p>{{$setting->area}}</p>
                    <p>{{$setting->postal_code}}</p>
                </div>
                <div class="company-contact">
                    <p>
                        <i class="feather icon-mail"></i>
                        {{$setting->email}}                    </p>
                    <p>
                        <i class="feather icon-phone"></i>
                        {{$setting->phone}}                    </p>
                </div>
            </div>
        </div>
        <!--/ Invoice Recipient Details -->

        <!-- Invoice Items Details -->
        <div id="invoice-items-details" class="pt-1 invoice-items-table">
            <div class="row">
                <div class="table-responsive col-12">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>المنتج</th>
                                <th>سعر التغليف</th>
                                <th>سعر الطباعة</th>

                                <th>الكمية</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($covers as $cover)

                            <tr>
                                <td>{{$cover["name"]}}</td>
                                <td>{{$cover["cover_price"]}}</td>
                                <td>{{$cover["print_price"]}}</td>

                                <td>{{count($cover["files"])}} ملف</td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
@if($order_products)
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>المنتج</th>
                                <th> السعر</th>

                                <th>الكمية</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_products as $p)

                            <tr>
                                <td>{{$p["name"]}}</td>
                                <td>{{$p["total"]}}</td>
                                <td>{{$p["quantity"]}}</td>

                            </tr>
                            @endforeach


                        </tbody>
                    </table>

                    @endif
                </div>
            </div>
        </div>
        <div id="invoice-total-details" class="invoice-total-table">
            <div class="row">
                <div class="col-7 offset-5">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>السعر قبل الخصم</th>
                                    <td>{{$invoce->before_discount}}</td>
                                </tr>
                                {{-- <tr>
                                    <th>DISCOUNT (5%)</th>
                                    <td>5700 USD</td>
                                </tr> --}}
                                <tr>
                                    <th>الأجمالي</th>
                                    <td>{{$invoce->total}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Invoice Footer -->
        {{-- <div id="invoice-footer" class="text-right pt-3">
            <p>Transfer the amounts to the business amount below. Please include invoice number on your check.
                <p class="bank-details mb-0">
                    <span class="mr-4">BANK: <strong>FTSBUS33</strong></span>
                    <span>IBAN: <strong>G882-1111-2222-3333</strong></span>
                </p>
        </div> --}}
        <!--/ Invoice Footer -->

    </div>
</section>
<!-- invoice page end -->
