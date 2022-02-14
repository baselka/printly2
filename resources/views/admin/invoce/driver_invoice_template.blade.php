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
            <a  class="btn btn-primary btn-print mb-1 mb-md-0" href="{{route('delete_invoce', ['id' =>$invoce->id ])}}">{{__("public.delete")}}</a>

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
            <div class="col-sm-6 col-12 text-left pt-1">
                <div class="media pt-1">
                    @php
                    require_once (base_path().'/vendor/picqer/php-barcode-generator/src/BarcodeGenerator.php');
                       require_once (base_path().'/vendor/picqer/php-barcode-generator/src/BarcodeBar.php');
                     require_once (base_path().'/vendor/picqer/php-barcode-generator/src/Barcode.php');
                     require_once (base_path().'/vendor/picqer/php-barcode-generator/src/Types/TypeInterface.php');
                               require_once (base_path().'/vendor/picqer/php-barcode-generator/src/Types/TypeCode128.php');
                                 
                         require_once (base_path().'/vendor/picqer/php-barcode-generator/src/BarcodeGeneratorHTML.php');
                    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                @endphp

                {!! $generator->getBarcode(''.$invoce->name, $generator::TYPE_CODE_128) !!}                </div>
            </div>




            <div class="col-sm-6 col-12 text-left pt-1">
                <h1>فاتورة</h1>
                <div class="invoice-details mt-2">
                    <h6>رقم الفاتورة</h6>
                    <p>{{$invoce->name}}</p>
                    <h6> السائق</h6>
                    <p> {{App\Http\Controllers\ProfileController::get_user_info($invoce->driver)->name}} </p>
                    <h6 class="mt-2">تاريخ الفاتورة</h6>
                    <p>{{$invoce->created_at}}</p>
                   <h6>حالة الفاتورة </h6>
                   <h6>@if($invoce->paid == 1) مسددة @else غير مسددة @endif</h6>

                </div>
            </div>
        </div>
        <!--/ Invoice Company Details -->

        <!-- Invoice Recipient Details -->
        <div id="invoice-customer-details" class="row pt-2">


        </div>
        <!--/ Invoice Recipient Details -->

        <!-- Invoice Items Details -->
        <div id="invoice-items-details" class="pt-1 invoice-items-table">
            <div class="row">
                <div class="table-responsive col-12">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>رقم الطلب</th>
                                <th>رقم الجوال</th>
                                <th>رقم الجوال الثاني</th>

                                <th> العنوان</th>

                                <th>سعر التغليف</th>
                                <th>سعر الطباعة</th>
                                <th>سعر المطبوعات</th>

                                <th>سعر التوصيل</th>

                                 <th> نسبة برنتلي من التوصيل</th>
                                 <th>حالة الطلب</th>
                                <th>الأجمالي</th>
                                <th>الحالة</th>
                                <th>سبب الحالة</th>

                                <th>طريقة الدفع</th>
                                <th>عرض </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                 $total = 0;
                                ?>
                            @foreach ($orders as $order)
<?php $total = $total + $order->total; ?>
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{App\Http\Controllers\ProfileController::get_user_info($order->user_id)->phone}}</td>
                                <td>{{App\Http\Controllers\ProfileController::get_user_info($order->user_id)->phone2}}</td>

                                <td>{{\App\Http\Controllers\OrderController::get_address($order->address)}}</td>

                                <td>{{$order->cover_price}}</td>
                                <td>{{$order->print_price}}</td>
                                <td>{{intval($order->cover_price) + intval($order->print_price) }}</td>
                                <td>{{$order->delivery_price}}</td>

                                <td>{{App\Http\Controllers\ProfileController::get_company_money_from_driver($invoce->driver ,$order->address,$order->delivery_price )}}</td>
                                <td>{{\App\Http\Controllers\OrderController::getOrderStatus($order->id)}}</td>

                                <td>{{$order->total}}</td>
                                <td>{{\App\Http\Controllers\OrderController::getOrderStatus($order->id)}}</td>
                                <td>{{\App\Http\Controllers\OrderController::getOrderStatusComment($order->id)}}</td>

                                <td>{{\App\Http\Controllers\OrderController::get_payment_method($order->id)}}</td>

                                <td><a href="{{route(''.$show_order_route, ['id' =>$order->id ])}}">{{__("public.show")}}</a></td>
                                <td><a href="{{route(''.$show_order_route, ['id' =>$order->id ])}}">تعديل عنوان الطلب</a></td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>

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
                                    <th> اسم منشئ القاتورة</th>
                                    <td>{{App\Http\Controllers\ProfileController::get_user_info($invoce->creator)->name}}</td>
                                </tr>
                                <tr>
                                    <th> السائق</th>
                                    <td>{{App\Http\Controllers\ProfileController::get_user_info($invoce->driver)->name}}</td>
                                </tr>
                                <tr>
                                    <th> نوع السائق</th>
                                    <td>{{App\Http\Controllers\ProfileController::get_driver_type($invoce->driver)}}</td>
                                </tr>
                                <tr>
                                    <th> حالة الفاتورة </th>
                                    <td>@if($invoce->paid == 1) مسددة @else غير مسددة @endif</td>
                                </tr>


                                {{-- <tr>
                                    <th>DISCOUNT (5%)</th>
                                    <td>5700 USD</td>
                                </tr> --}}
                                <tr>
                                    <th>الأجمالي</th>
                                    <td>{{$total}}</td>
                                </tr>

                                <tr>
                                    <th>رقم الفاتوره</th>
                                    <td>{{$invoce->name}}</td>
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
