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
                            <h2 class="content-header-title float-left mb-0">{{__('public.products')}}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">{{__('public.home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('coupons')}}">{{__('public.coupons')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="{{route('add-coupon')}}">{{ __('public.add') }}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card">




            <div class="card-content">
                <div class="card-body">
                    <form method="POST" action="{{ route('add-coupon')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('public.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">كود الخصم </label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" placeholder="{{$code}}" value="{{ old('code') }}" required autocomplete="code" autofocus>

                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_start" class="col-md-4 col-form-label text-md-right">يبدا من   </label>

                            <div class="col-md-6">
                                <input id="date_start" type="date" class="form-control @error('date_start') is-invalid @enderror" name="date_start"  value="{{ old('date_start') }}" required autocomplete="date" autofocus>

                                @error('date_start')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="date_end" class="col-md-4 col-form-label text-md-right"> ينتهي في    </label>

                            <div class="col-md-6">
                                <input id="date_end" type="date" class="form-control @error('date_end') is-invalid @enderror" name="date_end"  value="{{ old('date_end') }}" required autocomplete="date_end" autofocus>

                                @error('date_end')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                           <div class="form-group row">
                            <label for="uses_customer" class="col-md-4 col-form-label text-md-right">  عدد المستخدمين     </label>

                            <div class="col-md-6">
                                <input id="uses_customer" type="number" class="form-control @error('uses_customer') is-invalid @enderror" name="uses_customer"  value="{{ old('uses_customer') }}" required autocomplete="uses_customer" autofocus>

                                @error('uses_customer')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="minmum" class="col-md-4 col-form-label text-md-right">  الحد الأدني </label>

                            <div class="col-md-6">
                                <input id="minmum" type="number" class="form-control @error('minmum') is-invalid @enderror" name="minmum"  value="{{ old('minmum') }}" required autocomplete="minmum" autofocus>

                                @error('minmum')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="maxmum" class="col-md-4 col-form-label text-md-right">  الحد الأقصي </label>

                            <div class="col-md-6">
                                <input id="maxmum" type="number" class="form-control @error('maxmum') is-invalid @enderror" name="maxmum"  value="{{ old('maxmum') }}" required autocomplete="maxmum" autofocus>

                                @error('maxmum')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right "> خصم علي</label>


                            <div class="col-md-6">

                                <select class="select2 form-control code_type @error('coupon_type') is-invalid @enderror" name="coupon_type" >
                                    <optgroup label=" خصم علي">


                                    <option value="4">التغليف</option>
                                        <option value="3">الطباعة </option>
                                        <option value="7">التحويل البنكي </option>
                                        <option value="8">Apple Pay</option>
                                        <option value="9">STC Pay</option>
                                        <option value="10">Credit</option>
                                    <option value="6">المدن</option>
                                    <option value="5">الجامعات</option>

                                        <option value="2">الكل </option>


                                    </optgroup>
                                </select>

                                @error('coupon_type')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                          <div class="form-group uni row">
                            <label for="name" class="col-md-4 col-form-label text-md-right ">الجامعة</label>


                            <div class="col-md-6">

                                <select class="select2 form-control  @error('uni') is-invalid @enderror" name="uni" >
                                    <optgroup label="الجامعة">

                                        <option value="all">الكل </option>

@foreach($uni as $u)
                                    <option value="{{$u->id}}">{{$u->name}}</option>
                                    @endforeach
                                     

                                    </optgroup>
                                </select>

                                @error('uni')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                          <div class="form-group city row">
                            <label for="name" class="col-md-4 col-form-label text-md-right ">المدينة</label>


                            <div class="col-md-6">

                                <select class="select2 form-control type @error('city') is-invalid @enderror" name="city" >
                                    <optgroup label="المدينة">

                                        <option value="all">الكل </option>

@foreach($city as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                     

                                    </optgroup>
                                </select>

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right type">نوع الخصم</label>


                            <div class="col-md-6">

                                <select class="select2 form-control type @error('type') is-invalid @enderror" name="type" >
                                    <optgroup label="نوع الخصم">


                                    <option value="1">بالنسبة</option>
                                        <option value="2">بالمبلغ </option>

                                    </optgroup>
                                </select>

                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



<div class="form-group row precentage">
                            <label for="precentage" class="col-md-4 col-form-label text-md-right">  النسبة     </label>

                            <div class="col-md-6">
                                <input id="precentage" type="number" class="form-control @error('precentage') is-invalid @enderror" name="precentage"  value="{{ old('precentage') }}"  autocomplete="precentage" autofocus>

                                @error('precentage')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<div class="form-group row money">
                            <label for="money" class="col-md-4 col-form-label text-md-right">  المبلغ      </label>

                            <div class="col-md-6">
                                <input id="money" type="text" class="form-control @error('money') is-invalid @enderror" name="money"  value="{{ old('money') }}"  autocomplete="money" autofocus>

                                @error('money')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="accepted" class="col-md-4 col-form-label text-md-right">الحالة </label>


                            <div class="col-md-6">

                                <select class="select2 form-control" name="accepted">
                                    <optgroup label="الحالة ">


                                        <option value="1"> مفعل</option>

                                        <option value="0">غير مفعل  </option>
                                    </optgroup>
                                </select>

                                @error('accepted')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('public.add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
    <script>
        $(document).ready(function() {
    "use strict";
    $(".uni").hide();
$(".city").hide();
            $(".money").hide();
            $(".type").on("change",function(){
                if($(this).val() == 1){
$(".precentage").show();
$(".money").hide();
                }else{
$(".money").show();
$(".precentage").hide();
                }
            })
            
            
            
            
                  $(".code_type").on("change",function(){
                if($(this).val() == 5){
$(".uni").show();
$(".city").hide();
                }else if($(this).val() == 6){
$(".uni").hide();
$(".city").show();
                }else{
$(".city").hide();
$(".uni").hide();
                }
            })
            
            
            
            
            
        })
    </script>
@endsection
