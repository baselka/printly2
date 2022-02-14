@extends('layouts.admin')
@section('content')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">الطلبات</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">{{__('public.home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route(''.$order_route)}}">الطلبات</a>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <a class="btn btn-success" href="{{route('export_orders')}}">{{__('public.export')}}</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
            <form  class="form-search text-center" action="{{route(Route::current()->getName())}}" method="GET" >
                <div class="form-group row">
                    <input type="text" name='s' class="form-control col-sm-2" />
                    <input type="date" name='from' class="form-control col-sm-2 date" placeholder="من" />
                    <input type="date" name='to' class="form-control col-sm-2 date" placeholder="الي" />
                    <select class="form-control col-sm-2" name="uni">
                        <option selected disabled>الجامعة</option>
                        @foreach($universty as $uni)
                        <option value="{{$uni->id}}">{{$uni->name}}</option>
                        @endforeach
                    </select>
    <select class="form-control col-sm-2" name="coll">
                                <option selected disabled>الكلية</option>

                        @foreach($college as $coll)
                        <option value="{{$coll->id}}">{{$coll->name}}</option>
                        @endforeach
                    </select>
                      <select class="form-control col-sm-2" name="city">
                                                  <option selected disabled>المدينة</option>

                        @foreach($city as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                           <select class="form-control col-sm-2" name="area">
                                                       <option selected disabled>المنطقه</option>

                        @foreach($area as $a)
                        <option value="{{$a->id}}">{{$a->name}}</option>
                        @endforeach
                    </select>
                    <input class="bbtn btn-outline-success waves-effect waves-light" type="submit" name="submit" value="{{__('public.search')}}"  />
                </div>
            </form>

        <div class="content-body">

            <div class="action-btns d-none">
                <div class="btn-dropdown mr-1 mb-1">
                    <div class="btn-group dropdown actions-dropodown">
                        <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            تغير حالة الطلب
                        </button>
                        <div class="dropdown-menu">
                            @foreach ($order_status as $s)
                            <a class=" dropdown-item status_c" href="javascript:void(0)" id="{{$s->id}}">{{$s->name}}</a>

                            @endforeach
                     </div>
                    </div>


                    <div class="btn-group dropdown actions-dropodown">
                        <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
عمال الطباعه                        </button>
                        <div class="dropdown-menu">
                            @foreach ($printers as $p)
        <a class="dropdown-item printer" href="javascript:void(0)" id="{{$p->id}}">{{$p->name}}</a>

        @endforeach
                     </div>
                    </div>

                    <div class="btn-group dropdown actions-dropodown">
                        <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
عمال التغليف                        </button>
                        <div class="dropdown-menu">
                            @foreach ($covers as $c)
                            <a class="dropdown-item  cover" href="javascript:void(0)" id="{{$c->id}}">{{$c->name}}</a>

                            @endforeach
                     </div>
                    </div>
                </div>
            </div>

            <section id="data-list-view" class="data-list-view-header">


                <div class="table-responsive">
                    <table class="table data-list-view">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{__('public.name')}}</th>
                            <th scope="col">اسم العميل</th>
                            <th scope="col">رقم جوال العميل</th>
                            <th scope="col">رقم الجوال الثاني</th>
                            <th scope="col">ايميل العميل</th>
                            <th scope="col">عنوان العميل</th>
                            <th scope="col">السعر بعد الخصم</th>
                            <th scope="col">السعر قبل الخصم</th>
                            <th scope="col">  طريقة الدفع</th>
                            <th scope="col">   الحالة </th>
                            <th scope="col">سبب الحالة</th>
                            <th scope="col">   موظف الطباعه</th>
                            <th scope="col">   موظف التغليف</th>
                            <th scope="col">   موظف السائق</th>
                            <th scope="col">    الملاحظات</th>

                            <th scope="col">{{__('public.date')}}</th>
                            <th scope="col">{{__('public.add_note')}}</th>
                            <th scope="col">{{__('public.show')}}</th>
                            <th scope="col">{{__('public.delete')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                            <?php $i=0 ;?>
                          @if($orders)
                        @foreach($orders as $order)
                            <tr val="{{$order->id}}">
                                <td scope="row">{{++$i}}</td>
                                <td  class="product-name">{{$order->name}}</td>
                                <td>{{\App\Http\Controllers\ProfileController::get_user_info($order->user_id)->name}}</td>
                                <td>{{\App\Http\Controllers\ProfileController::get_user_info($order->user_id)->phone}}</td>
                                <td>{{\App\Http\Controllers\ProfileController::get_user_info($order->user_id)->phone2}}</td>
                                <td>{{\App\Http\Controllers\ProfileController::get_user_info($order->user_id)->email}}</td>

                                <td>{{\App\Http\Controllers\OrderController::get_address($order->address)}}</td>
                                <td class="product-price">{{$order->total}}</td>
                                <td  class="product-price">{{$order->before_discount}}</td>
                               <td>{{\App\Http\Controllers\OrderController::get_payment_method($order->id)}}</td>
                               <td>{{\App\Http\Controllers\OrderController::getOrderStatus($order->id)}}</td>
                               <td>{{\App\Http\Controllers\OrderController::getOrderStatusComment($order->id)}}</td>



                               <td>{{\App\Http\Controllers\ProfileController::get_user_info($order->printer)->name}}</td>
                               <td>{{\App\Http\Controllers\ProfileController::get_user_info($order->cover)->name}}</td>
                               <td>{{\App\Http\Controllers\ProfileController::get_user_info($order->driver)->name}}</td>
                               <td id="{{$order->id}}">{{$order->note}}</td>

                                <td>{{$order->created_at}}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-success waves-effect waves-light"  data-toggle="modal" data-target="#ord{{$order->id }}">
                                        {{__("public.add_note")}}
                                    </button>
                                </td>
                                <td><a href="{{route(''.$show_order_route, ['id' =>$order->id ])}}">{{__("public.show")}}</a></td>
                               @if(auth()->user()->type == 1 )
                               <td><a href="{{route(''.$delete_order_route, ['id' =>$order->id ])}}">        <span class="action-delete"><i class="feather icon-trash"></i></span>
                               </a></td> @endif

                            </tr>
                            <div class="modal fade text-left" id="ord{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">اضافة ملاحظة  </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('add_note')}}" id="form{{$order->id}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{$order->id}}" name="order_id"  />
                                            <div class="modal-body">
                                                <label > الملاحظة </label>
                                                <textarea class="form-control" name="note">{{$order->note}}</textarea>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" o_id="{{$order->id}}" class="btn btn-primary addnote" >اضافة</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                      @endif
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

    </div>
    </div>
    <script>
        $(".status_c").on("click",function(){
   var status = $(this).attr("id");
   var ids  = [];
   $(".selected").each(function(){    ids.push($(this).attr("val"));
});
if(status == '' || ids.length == 0){
    return false;
}else{
    $.ajax({
        url: "/admin/multi_order_status_change",
        type: "post",
        data: {
            _token: $("meta[name=csrf-token]").attr("content"),
            status: status,
            ids : ids,
        },

        dataType: "json",

        success: function(json) {
            setTimeout(function() {
                          $("#loader").modal("hide");
                    }, 500);
            // Need to set timeout otherwise it wont update the total
            if (json.success == "1") {
                location.reload();
            }

        },
        error: function(xhr, ajaxOptions, thrownError) {
            // alert(
            //     thrownError +
            //         "\r\n" +
            //         xhr.statusText +
            //         "\r\n" +
            //         xhr.responseText
            // );
        }
    });
}

        });

        $(".printer").on("click",function(){
   var printer = $(this).attr("id");
   var ids  = [];
   $(".selected").each(function(){    ids.push($(this).attr("val"));
});
if(printer == '' || ids.length == 0){
    return false;
}else{
    $.ajax({
        url: "/admin/multi_order_printer",
        type: "post",
        data: {
            _token: $("meta[name=csrf-token]").attr("content"),
            printer: printer,
            ids : ids,
        },

        dataType: "json",

        success: function(json) {
            setTimeout(function() {
                          $("#loader").modal("hide");
                    }, 500);
            // Need to set timeout otherwise it wont update the total
            if (json.success == "1") {
                location.reload();
            }

        },
        error: function(xhr, ajaxOptions, thrownError) {
            // alert(
            //     thrownError +
            //         "\r\n" +
            //         xhr.statusText +
            //         "\r\n" +
            //         xhr.responseText
            // );
        }
    });
}

        });

        $(".cover").on("click",function(){
   var cover = $(this).attr("id");
   var ids  = [];
   $(".selected").each(function(){    ids.push($(this).attr("val"));
});
if(cover == '' || ids.length == 0){
    return false;
}else{
    $.ajax({
        url: "/admin/multi_order_cover",
        type: "post",
        data: {
            _token: $("meta[name=csrf-token]").attr("content"),
            cover: cover,
            ids : ids,
        },

        dataType: "json",

        success: function(json) {
            setTimeout(function() {
                          $("#loader").modal("hide");
                    }, 500);
            // Need to set timeout otherwise it wont update the total
            if (json.success == "1") {
                location.reload();
            }

        },
        error: function(xhr, ajaxOptions, thrownError) {
            // alert(
            //     thrownError +
            //         "\r\n" +
            //         xhr.statusText +
            //         "\r\n" +
            //         xhr.responseText
            // );
        }
    });
}





        });


        $(".addnote").on("click",function(){
            var o_id = $(this).attr('o_id');
         var form  =    $("#form"+o_id).serialize()

    $.ajax({
        url: "/admin/orders/add_note",
        type: "post",
        data: form,

        dataType: "json",

        success: function(json) {

            // Need to set timeout otherwise it wont update the total
            if (json.success == "1") {
                alert(json.message);
                $("#ord"+o_id).modal("hide");
                $("#"+o_id).text(form.note);
            }

        },
        error: function(xhr, ajaxOptions, thrownError) {
            // alert(
            //     thrownError +
            //         "\r\n" +
            //         xhr.statusText +
            //         "\r\n" +
            //         xhr.responseText
            // );
        }
    });
})
    </script>
@endsection
