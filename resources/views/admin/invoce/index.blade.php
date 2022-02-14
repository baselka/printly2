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
                            <h2 class="content-header-title float-left mb-0">الفواتير</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">{{__('public.home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('invoce')}}">الفواتير</a>
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
                    <div class="dropdown" style="float:right;">
                        <button class="dropbtn">تغير حالة الفاتورة</button>
                        <div class="dropdown-content">
                            <a class="status_c" href="javascript:void(0)" id="1">مسددة</a>
                            <a class="status_c" href="javascript:void(0)" id="0">غير مسددة</a>


                        </div>
                      </div>

                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-success waves-effect waves-light" data-toggle="modal" data-target="#inlineForm">
                                اضافة فاتوره
                            </button>
                                                </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">الفواتير</h4>
            </div>

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-error">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="card-content">
                <form  class="form-search" action="{{route(Route::current()->getName())}}" method="GET" >
                    <div class="form-group">
                        <input type="text" name='s' class="form-control" />
                        <input type="date" name='from' class="form-control date" placeholder="من" />
                        <input type="date" name='to' class="form-control date" placeholder="الي" />

                        <input class="btn-search" type="submit" name="submit" value="{{__('public.search')}}"  />
                    </div>
                </form>

                <div class="card-body">
                    <section id="data-list-view" class="data-list-view-header">


                        <div class="table-responsive">
                            <table class="table data-list-view">                        <thead>
                        <tr>
                            <th>رقم تسلسلي</th>
                            {{-- <th scope="col">#{{__('public.id')}}</th> --}}
                            <th scope="col">رقم الفاتورة</th>
                            <th scope="col">{{__('public.driver')}}</th>
                            <th scope="col">اسم منشئ الفاتورة</th>
                            <th scope="col"> حالة الفاتورة</th>
                            <th scope="col"> المبلغ  المستحق</th>

                            <th scope="col">{{__('public.date')}}</th>

                            <th scope="col">{{__('public.show')}}</th>
                            <th scope="col">{{__('public.delete')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                          @if($invoces)
                          <?php $i = 1; ?>
                        @foreach($invoces as $invoce)
                            <tr>
                                <th scope="row"><input type="checkbox" name="checked"  value="{{$invoce->id}}">{{$i}}</th>

                                {{-- <th scope="row">{{$invoce->id}}</th> --}}
                                <td>{{$invoce->name}}</td>
                                 <td>{{$invoce->driver ? App\Http\Controllers\ProfileController::get_user_info($invoce->driver)->name : ''}}</td>
                                 <td>{{App\Http\Controllers\ProfileController::get_user_info($invoce->creator)->name}}</td>
                                <td>@if($invoce->paid == 1) مسددة @else غير مسددة @endif</td>
          <td>

            <?php
                 $total = DB::selectOne("select SUM(o.total) as total from orders as o left join invoce_order as i on i.order_id = o.id where i.invoce_id = $invoce->id");
                ?>
                {{$total->total}}
          </td>
                                    <td>{{$invoce->created_at}}</td>


                                <td><a href="{{route('show_invoce', ['id' =>$invoce->id ])}}">{{__("public.show")}}</a></td>
                                <td><a href="{{route('delete_invoce', ['id' =>$invoce->id ])}}">{{__("public.delete")}}</a></td>

                            </tr>
                            <?php $i++ ?>
                        @endforeach
                      @endif
                        </tbody>
                    </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>

    </div>
    </div>

    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">اضافة فاتورة جديدة </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('store_invoce')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label > السائق </label>

                        <select class="form-group select2" name="driver">
                            @foreach ($drivers as $d)
                          <option value="{{$d->id}}" >{{$d->name}}</option>

                            @endforeach
                        </select>

                        {{-- <label>تفاصيل الفاتورة </label>
                        <div class="form-group">
                            <textarea  name="desc" placeholder="التفاصيل" class="form-control"></textarea>
                        </div>

                        <label>اجمالي الفاتورة </label>
                        <div class="form-group">
                            <input type="text" name="price" placeholder="الأجمالي" class="form-control">
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >اضافة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(".status_c").on("click",function(){
   var status = $(this).attr("id");
   var ids  = [];
   $("input:checkbox[name=checked]:checked").each(function(){
    ids.push($(this).val());
});
if(status == '' || ids.length == 0){
    return false;
}else{
    $.ajax({
        url: "/admin/multi_invoce_status_change",
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
        </script>
@endsection
