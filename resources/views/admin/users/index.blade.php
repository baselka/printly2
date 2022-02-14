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
                            <h2 class="content-header-title float-left mb-0">{{$title}}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">{{__('public.home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('users',['type'=>$type])}}">{{$title}}</a>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <a class="btn btn-success" href="{{route('add-user',['type'=>$type])}}">{{__('public.add')}}</a>
                            <a class="btn btn-success" href="{{route('export_users',['type'=>$type])}}">{{__('public.export')}}</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{$title}}</h4>
            </div>


            <div class="card-content">

                <form  class="form-search" action="{{route(Route::current()->getName(),['type'=>$type])}}" method="GET" >
                    <div class="row">
                    <div class="form-group col-md-3">
                        <input type="text" name='s' placeholder="بحث" class="form-control" />
                    </div>

                   <div class="form-group col-sm-2">
                    <select class="form-control" name="block">
                        <option  selected>حالة الحظر</option>
                        <option value="1" @if(request()->get("block") == "1" ) selected  @endif >المحظورين</option>
                        <option value="0" @if(request()->get("block") == "0" ) selected  @endif>الغير محظورين</option>
                    </select>
               </div>
               <div class="form-group col-sm-2">
                <select class="form-control" name="sort">
                    <option disabled selected> الطلبات</option>
                    <option value="1">ترتيب جسب الاعلي طلبا</option>
                    <option value="0">ترتيب حسب الاأقل طلبا</option>
                </select>
           </div>

                     <input type="hidden" name='type' value="{{$type}}" class="form-control" />

                     <div class="form-group col-md-1">
                        <input class="btn-search" type="submit" name="submit" value="{{__('public.search')}}"  />
                  </div>
                </div>
                </form>
                <div class="card-body">
                    <section id="data-list-view" class="data-list-view-header">


                        <div class="table-responsive">
                            <table class="table data-list-view">
                        <thead>
                        <tr>
                            <th scope="col">#{{__('public.id')}}</th>
                            <th scope="col">{{__('public.name')}}</th>
                            <th scope="col">{{__('public.phone')}}</th>
                            <th scope="col">{{__('public.phone2')}}</th>
                            <th scope="col">{{__('public.email2')}}</th>
                            <th scope="col">الحالة </th>
                            <th scope="col">حظر الي </th>
                            <th scope="col">سبب الحظر </th>
                            @if($type == 0)
                            <th>عدد الطلبات</th>
                            <th>الجامعة</th>
                            <th>الكلية</th>
                            <th>التخصص</th>
                            <th scope="col">{{__('public.orders')}}</th>

                            @endif
                            @if($type == 6)
                            <th>عدد الفواتير</th>
                            <th> المبلغ المستحق</th>

                            <th>عدد الطلبات</th>

                            @endif
                            <th>تاريخ التسجيل</th>



                            <th scope="col">{{__('public.edit')}}</th>
                                   <th scope="col">{{__('public.delete')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                          @if($users)
                        @foreach($users as $user)
                        <?php
                            \Carbon\Carbon::setLocale('ar');

                        ?>
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->phone2}}</td>
                                <td>{{$user->email}}</td>
                                <td>@if($user->block == 1 ) محظور @else  غير محظور@endif</td>
                                <td>{{$user->block_to}}</td>
                                <td>{{$user->reason}}</td>
                                @if($user->type == 0)
                                <td>{{count(DB::select("select id from orders where user_id = $user->id"))}}</td>
                                <td>{{App\Http\Controllers\ProfileController::get_customer_data($user->id)->universty ?? ''}}</td>
                                <td>{{App\Http\Controllers\ProfileController::get_customer_data($user->id)->college ?? ''}}</td>
                                <td>{{App\Http\Controllers\ProfileController::get_customer_data($user->id)->specialist ?? ''}}</td>
                                <td><a href="{{route('u_orders',['id' => $user->id ,'type' => $type ])}}">{{__("public.orders")}}</a></td>

                                @endif
                                @if($user->type == 6)
                                <td>{{App\Http\Controllers\ProfileController::get_driver_data($user->id)->number_of_invoce}}</td>

                                <td>{{App\Http\Controllers\ProfileController::get_driver_data($user->id)->total}}</td>

                                <td>{{App\Http\Controllers\ProfileController::get_driver_data($user->id)->number_of_order}}</td>
                                @endif
                                <td>@if($user->created_at) {{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('l j F Y') }} @endif</td>

                                <td><a href="{{route('show-user', ['id' =>$user->id ,'type'=>$type ])}}">{{__("public.edit")}}</a></td>
 <td><a href="{{route('delete-user', ['id' =>$user->id ,'type'=>$type ])}}">{{__("public.delete")}}</a></td>
                            </tr>
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
    <script>
        $(document).ready(function(){
            $(".action-btns ").remove();
        })
    </script>
@endsection
