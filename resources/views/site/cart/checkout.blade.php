@extends('layouts.app')

@section('content')
<style>
    .select2-container--classic .select2-selection--single {
  min-height : 40px !important;
}

.select2-container--classic:focus, .select2-container--default:focus {
  outline : none;
}

.select2-container--classic .select2-selection--single, .select2-container--default .select2-selection--single {
  min-height : 38px;
  padding : 5px;
  border : 1px solid rgba(0, 0, 0, 0.2);
}
.select2-container--classic .select2-selection--single:focus, .select2-container--default .select2-selection--single:focus {
  outline : 0;
  border-color : #7367F0 !important;
  box-shadow : 0 3px 10px 0 rgba(0, 0, 0, 0.15) !important;
}
.select2-container--classic .select2-selection--single .select2-selection__rendered i, .select2-container--default .select2-selection--single .select2-selection__rendered i {
  margin-right : 0.5rem;
}
.select2-container--classic .select2-selection--single .select2-selection__arrow, .select2-container--default .select2-selection--single .select2-selection__arrow {
  min-height : 38px !important;
}

.select2-container--classic.select2-container--open .select2-selection--single, .select2-container--default.select2-container--open .select2-selection--single {
  border-color : #7367F0 !important;
  outline : 0;
}

.select2-container--classic.select2-container--focus, .select2-container--default.select2-container--focus {
  outline : 0;
}
.select2-container--classic.select2-container--focus .select2-selection--multiple, .select2-container--default.select2-container--focus .select2-selection--multiple {
  border-color : #7367F0 !important;
  outline : 0;
}

.select2-container--classic .select2-selection--multiple, .select2-container--default .select2-selection--multiple {
  min-height : 38px !important;
  border : 1px solid rgba(0, 0, 0, 0.2);
}
.select2-container--classic .select2-selection--multiple:focus, .select2-container--default .select2-selection--multiple:focus {
  outline : 0;
  border-color : #7367F0 !important;
  box-shadow : 0 3px 10px 0 rgba(0, 0, 0, 0.15) !important;
}
.select2-container--classic .select2-selection--multiple .select2-selection__choice, .select2-container--default .select2-selection--multiple .select2-selection__choice {
  background-color : #7367F0 !important;
  border-color : #4839EB !important;
  color : #FFFFFF;
  padding : 5px;
}
.select2-container--classic .select2-selection--multiple .select2-selection__rendered li .select2-search__field, .select2-container--default .select2-selection--multiple .select2-selection__rendered li .select2-search__field {
  margin-top : 10px;
}
.select2-container--classic .select2-selection--multiple .select2-selection__choice__remove, .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
  color : #FFFFFF !important;
  float : right;
  margin-left : 0.5rem;
}
.select2-container--classic .select2-selection--multiple i, .select2-container--default .select2-selection--multiple i {
  position : relative;
  top : 1px;
  margin-right : 0.5rem;
  padding-left : 1px;
}
.select2-container--classic .select2-selection--multiple[class*=bg-] .select2-selection__choice, .select2-container--default .select2-selection--multiple[class*=bg-] .select2-selection__choice {
  background-color : rgba(0, 0, 0, 0.15) !important;
  border-color : rgba(0, 0, 0, 0.2) !important;
}

.select2-container--classic .select2-results__options .select2-results__option i, .select2-container--default .select2-results__options .select2-results__option i {
  margin-right : 0.5rem;
}

.select2-container--classic .select2-result-repository__avatar img, .select2-container--default .select2-result-repository__avatar img {
  width : 50px;
}

.select2-container--classic [class*='icon-'], .select2-container--default [class*='icon-'] {
  font-family : 'feather';
}

.select2-container--classic .select-lg, .select2-container--default .select-lg {
  min-height : calc(1.25em + 1.4rem + 1px) !important;
  font-size : 1.2rem;
  margin-bottom : 0 !important;
  padding : 0.3rem 0.7rem;
}
.select2-container--classic .select-lg.select2-selection--single .select2-selection__rendered, .select2-container--default .select-lg.select2-selection--single .select2-selection__rendered {
  padding-top : 0.1rem;
}
.select2-container--classic .select-lg.select2-selection--single .select2-selection__arrow, .select2-container--default .select-lg.select2-selection--single .select2-selection__arrow {
  top : 0.2rem !important;
}
.select2-container--classic .select-lg.select2-selection--multiple, .select2-container--default .select-lg.select2-selection--multiple {
  padding : 0 0.2rem;
}
.select2-container--classic .select-lg.select2-selection--multiple .select2-selection__rendered, .select2-container--default .select-lg.select2-selection--multiple .select2-selection__rendered {
  padding-top : 0 !important;
}
.select2-container--classic .select-lg.select2-selection--multiple .select2-selection__rendered li, .select2-container--default .select-lg.select2-selection--multiple .select2-selection__rendered li {
  font-size : 1.2rem;
}
.select2-container--classic .select-lg.select2-selection--multiple .select2-selection__rendered .select2-selection__choice, .select2-container--default .select-lg.select2-selection--multiple .select2-selection__rendered .select2-selection__choice {
  padding : 5px;
}

.select2-container--classic .select-sm, .select2-container--default .select-sm {
  min-height : calc(1em + 1rem + 2px) !important;
  padding : 0 0.2rem;
  font-size : 0.75rem;
  margin-bottom : 0 !important;
  line-height : 1.5;
}
.select2-container--classic .select-sm.select2-selection--single .select2-selection__arrow, .select2-container--default .select-sm.select2-selection--single .select2-selection__arrow {
  top : -0.3rem !important;
}
.select2-container--classic .select-sm.select2-selection--multiple, .select2-container--default .select-sm.select2-selection--multiple {
  line-height : 1.3;
}
.select2-container--classic .select-sm.select2-selection--multiple .select2-selection__rendered, .select2-container--default .select-sm.select2-selection--multiple .select2-selection__rendered {
  padding : 3px;
}
.select2-container--classic .select-sm.select2-selection--multiple .select2-selection__rendered li, .select2-container--default .select-sm.select2-selection--multiple .select2-selection__rendered li {
  font-size : 0.75rem;
  margin-top : 2px;
}
.select2-container--classic .select-sm.select2-selection--multiple .select2-selection__choice, .select2-container--default .select-sm.select2-selection--multiple .select2-selection__choice {
  padding : 0 0.2rem;
}
.select2-container--classic .select-sm.select2-selection--multiple .select2-search--inline .select2-search__field, .select2-container--default .select-sm.select2-selection--multiple .select2-search--inline .select2-search__field {
  margin-top : 0;
}

.select2 .form-control::focus {
  border-color : #7367F0 !important;
}

</style>


        </header>
        <!--End-->

        <!--start page content-->
        <div class="page-content">
            <div class="container">
                <!--Start Form-->
                <form id="wizard" action="./finished.html" enctype="multipart/form-data">
               <input type="hidden" value="{{$tab2}}" class="h_a" />
                    <!--Start Step 4-->
                    <h3>
                        <span><img src="./img/icons/pay.png "></span> إتمام الدفع
                    </h3>
                    <div class="step-4 ">
                        <div class="pink-layout">
                            <div class="title blue-title text-center ">
                                <h2>طريقة الإستلام</h2>
                            </div>
                            <div class="mt-5">
                                <div class="radio-container style-1 " style="justify-content: center;">
                                    <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                        <input type="radio" name="delivered-case" value="1" checked>
                                        <div class="state ">
                                            <span class="icon ">التوصيل</span>
                                            <label></label>
                                        </div>
                                    </div>
                                    <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                        <input type="radio" name="delivered-case" value="2">
                                        <div class="state ">
                                            <span class="icon ">الإستلام من الفرع</span>
                                            <label></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="delivered-case-1">
                                <div class="tab-content">
                                    <div class="tab-pane  fade show  active  " id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-4 select-parent">
                                                    <label for=""> <img src="./img/icons/exclamation.png" alt="marker"> <span class="pink-color"> المدينة</span> </label>
                                                    <select class=" form-control city " name="city">
                                                    <option value="0">اسم مدينتك هنا ..</option>
                                                    @foreach ($city as $c)
                                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                                    @endforeach


                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-4 select-parent">
                                                    <label for=""> <img src="./img/icons/exclamation.png" alt="marker"> <span class="pink-color"> الحى</span> </label>
                                                    <select class=" form-control area ">
                                                    <option value="">اسم الحى هنا ..</option>

                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-4">
                                                    <label for=""> <img src="./img/icons/exclamation.png" alt="marker"> <span class="pink-color"> الشارع</span> </label>
                                                    <input class="form-control street" type="text" placeholder="اكتب اسم الشارع هنا">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-4">
                                                    <label for=""> <img src="./img/icons/exclamation.png" alt="marker"> <span class="pink-color"> تفاصيل أكثر</span> </label>
                                                    <input class="form-control more" type="text" placeholder="علامات مميزة أو رقم المجموعة السكنية">
                                                </div>
                                            </div>
                                            {{-- <div class="clearfix mb-5">
                                                <div class="text-end">
                                                    <a class="circle-btn add_address" href="#"> <i class="fas fa-plus-circle"></i> اضف عنوان </a>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="tab-pane  fade   " id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                        <div class="clearfix mb-5">
                                            <div class="text-end">
                                                <a class="circle-btn first-tab" href="#"> <i class="fas fa-plus-circle"></i> اضف عنوان آخر</a>
                                            </div>
                                        </div>
                                        <div class="address_container" >

                                        </div>
                                        {{-- <div class="text-end">
                                            <a class="circle-btn " onclick="confrim_address()"  href="#"> <i class="fas fa-plus-circle"></i> تاكيد العنوان </a>
                                        </div> --}}
                                    </div>
                                    <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                                        <div class="clearfix mb-5">
                                            <div class="text-end">
                                                <a class="circle-btn seconed-tab" href="javascript:void(0)"> <i class="fas fa-plus-circle"></i> اختر عنوان  آخر</a>
                                            </div>
                                        </div>

                                        <div class="flex-div confirmed_address">

                                        </div>
                                        {{-- <div class="clearfix mb-5">
                                            <div class="text-end">
                                                <a class="circle-btn  first-tab" href="javascript:void()"> <i class="fas fa-plus-circle"></i> اضف عنوان جديد</a>
                                            </div>

                                        </div> --}}
                                    </div>
                                </div>
                                <div class="clearfix mt-5">
                                    <div class="text-end">
                                        <a class="btn secondary-btn btn-lg next-tab  ">
                                             تاكيد العنوان </a>
                                    </div>
                                </div>
                            </div>

                            <div class="delivered-case-2 hidden">
                                @foreach ($branchs as $branch)


                                <div class="flex-div">
                                    <div>  <div class="pretty p-default p-smooth p-round">    <input type="radio" name="branch" class="branch_id" value="{{$branch->id}}">    <div class="state p-warning">        <label class="small"> </label>      </div>    </div> </div>
                                    <div style="width: 100px;" class="mb-2">
                                        <img src="{{URL::to('/')}}//uploads/banners/{{$branch->photo}}">
                                    </div>
                                    <div>
                                        <p class="semibold larger"> {{$branch->name}}</p>

                                    </div>
                                    <div class="text-center">
                                        <div class="privacy">
                                            <a href="#" data-toggle="modal" data-target="#branch{{$branch->id}}" class="btn">سياسة الإستلام</a>
                                            <a href="#"  class="btn">أوقات العمل</a>
                                        </div>
                                        <div class="location">
                                            <img src="./img/icons/location.png" alt="">
                                            <p class="light-pink-color semi-bold larger">موقع المكتبة</p>
                                        </div>
                                    </div>
                                </div>
                             <!-- Modal -->
<div class="modal fade" id="branch{{$branch->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
                                @endforeach
                                <div class="clearfix mt-5">
                                    <div class="text-end">
                                        <a class="btn secondary-btn btn-lg next-branch ">
                                             تاكيد الفرع </a>
                                    </div>
                                </div>
                            </div>
                            </div>

                        <div class="yellow-layout pay-details" style="display: none;">
                            <div class="title blue-title text-center ">
                                <h2>خيارات الدفع </h2>
                            </div>

                            <h3 class="pink-color mb-4 ">
                                <img src="./img/icons/invoice.png">
                                <span class="mx-4">فاتورة الطلب</span>
                            </h3>

                            <div class="bill mb-5">
                                <p class="larger semibold">
                                    <span class="blue-color">الأجمالي </span> {{$will_pay}} ريال
                                </p>
                                <p class="larger semibold">
                                    <span class="blue-color">السعر بعد الخصم</span> {{$after_discount}} ريال
                                </p>
                                <p class="larger semibold">
                                    <span class="blue-color">سعر التوصيل</span> <span class="arrival_price">{{$arrival_price}} ريال</span>
                                </p>
                                <input type="hidden" class="tot" name="total" value="{{$after_discount }}" />
                                <p class="larger semibold">
                                    <span class="blue-color">الإجمالي </span> <b class="totalAll">{{$total }} ريال</b>
                                </p>
                            </div>


                            <h3 class="pink-color mb-4 ">
                                <img src="./img/icons/wallet.png">
                                <span class="mx-4">فاتورة الطلب</span>
                            </h3>

                            <div class="radio-container style-5">
                                <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                    <input type="radio" name="pay" value="cod" class="pay_type" checked/>
                                    <div class="state ">
                                        <p class="icon">
                                            <img src="./img/icons/payment/cash.png ">
                                            <span>دفع نقدي</span>
                                        </p>
                                        <label></label>
                                    </div>
                                </div>
                                <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                    <input type="radio" name="pay" value="bank_transfer" class="pay_type" />
                                    <div class="state ">
                                        <p class="icon">
                                            <img src="./img/icons/payment/credit-card.png ">
                                            <span>تحويل بنكي</span>
                                        </p>
                                        <label></label>
                                    </div>
                                </div>
                                <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                    <input type="radio" name="pay" value="stc" class="pay_type" />
                                    <div class="state ">
                                        <p class="icon">
                                            <img src="./img/icons/payment/366497.png ">
                                            <span>STC Pay</span>
                                        </p>
                                        <label></label>
                                    </div>
                                </div>
                                <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                    <input type="radio" name="pay" class="pay_type" value="apple"  />
                                    <div class="state ">
                                        <p class="icon">
                                            <img src="./img/icons/payment/XMLID_34_.png ">
                                            <span>Apple Pay</span>
                                        </p>
                                        <label></label>
                                    </div>
                                </div>
                                @if($hide_wallet == 0)
                                <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                    <input type="radio" class="pay_type" name="pay" value="wallet" />
                                    <div class="state ">
                                        <p class="icon">
                                            <img src="./img/icons/payment/wallet.png ">
                                            <span>المحفظة</span>
                                        </p>
                                        <label></label>
                                    </div>
                                </div>
                                @endif
                            </div>
                            {{-- <div class="clearfix mt-5">
                                <div class="text-end">
                                    <a class="btn secondary-btn btn-lg pay">
                                         الدفع </a>
                                </div>
                            </div> --}}
                            <p class="larger pay-1">
                                <i class="fas fa-exclamation-circle yellow-color"></i>
                                <span class="pink-color bold">طلبات التوصيل داخل جدة </span> في حالة قيمة ومبلغ طلبك أعلى من 150 ريال فلن يتم تأكيد الطلب حتى فضلاً تحويل جزء من المبلغ أو المبلغ كاملاً مسبقا


                            </p>
                            <div class="pay-1">
                                <div class="col-md-12">
                                    <button type="button" style="margin-right: 15px; float:left" class="main-btn btn pay">اتمام  العملية</button>

                                </div>
                            </div>
                            <div class="pay-2 hidden">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="./img/icons/payment/1280px-NCB.svg.png" alt="">
                                        <ul class="list-unstyled  mt-4">
                                            <li> <span class="pink-color bold"> اسم الحساب: </span> مؤسسـة اطبع الأوراق للدعاية والإعـلان</li>
                                            <li> <span class="pink-color bold"> رقم الحساب : </span> 61 7000 0012 2009</li>
                                            <li> <span class="pink-color bold"> رقم الآيبان : </span> SA 38 1000 0061 7000 0012 2009</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <img src="./img/icons/payment/2560px-Al_Rajhi_Bank_Logo.svg.png" alt="">
                                        <ul class="list-unstyled mt-4">
                                            <li> <span class="pink-color bold"> اسم الحساب: </span> مؤسسة سناء بنت مصطفى بن كمال الحداد</li>
                                            <li> <span class="pink-color bold"> رقم الحساب: </span> 61 7000 0012 2009</li>
                                            <li> <span class="pink-color bold"> رقم الآيبان : </span> SA 38 1000 0061 7000 0012 2009</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="my-4">
                                    <p class="larger">
                                        <i class="fas fa-exclamation-circle yellow-color"></i>
                                        <span class="pink-color bold">فضلاً  </span> لمساعدتنا في تأكيد طلبك وتأكيد تحويل المبلغ فضلاً ادخل البيانات التالية
                                    </p>
                                </div>

                                <div class="row form-group mb-4 align-items-center">
                                    <div class="col-md-3 ">
                                        <label class="pink-color bold larger">التحويل تم باسم</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control tr_title"  placeholder="... التحويل تم باسم ">
                                    </div>
                                </div>

                                <div class="row form-group mb-4">
                                    <div class="col-md-3 ">
                                        <label class="pink-color bold larger">صورة التحويل</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="input-b2" id="input-b2" type="file"  required autocomplete="off"  accept=
                                        "application/pdf," multiple="multiple" data-browse-on-zone-click="true" multiple data-browse-on-zone-click="true">

                                    </div>
                                </div>

                                <div class="row form-group mb-4 align-items-center">
                                    <div class="col-md-3 ">
                                        <label class="pink-color bold larger">رقم الحوالة (إن وجد)</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control transfer_number" placeholder="... رقم الحوالة ">
                                    </div>
                                </div>
                                <div class="col-md-12">

                                <button type="button" style="margin-right: 15px; float:left" class="main-btn btn pay_with_transfer">اتمام  العملية</button>
                                </div>
                            </div>

                            <div class="pay-3 hidden">
                                <div class="form-group row align-items-center">
                                    <div class="col-md-3 offset-md-1">
                                        <label class="pink-color bold larger" for="pay-1">قم بإدخال رقم الجوال</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="pay-1" placeholder="... رقم الجوال">
                                    </div>
                                </div>
                            </div>


                            <div class="pay-4 hidden">

                            </div>
                            @if($hide_wallet == 0)

                            <div class="pay-5 hidden">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="content text-center my-4">
                                            <p class="semi-bold larger">رصيدك الحالي </p>
                                            <h2 class="pink-color bold">{{$wallet_amount}} <span class="larger">ريال</span> </h2>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="content text-center my-4">
                                            <p class="semi-bold larger">سعر العملية </p>
                                            <h2 class="bold">{{$after_discount + $arrival_price }}<span class="larger">ريال</span> </h2>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="content text-center my-4">
                                            <p class="semi-bold larger">متبقي بالمحفظة </p>
                                            <h2 class=" bold">{{$wallet_amount - ($after_discount + $arrival_price ) }} <span class="larger">ريال</span> </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
@endif
                        </div>

                    </div>
                    <!--End Step 4-->

                </form>
            </div>
        </div>

        <!--end-->

        @endsection

