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

</div>
</div>
<div class="card">





<div class="card-content">
    <div class="card-body">
        <form method="POST" action="{{ route('add-user',['type'=>$type])}}" enctype="multipart/form-data">
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
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('public.email2') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('public.phone') }}</label>

                <div class="col-md-6">
                    <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone') }}" required autocomplete="phone">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            @if($type == 7)
            <div class="form-group row">
                <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('public.code') }}</label>

                <div class="col-md-6">
                    <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{old('code') }}" required autocomplete="code">

                    @error('code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="safer_discount" class="col-md-4 col-form-label text-md-right">نسبة الخصم للسفير </label>

                <div class="col-md-6">
                    <input id="safer_discount" type="text" class="form-control @error('safer_discount') is-invalid @enderror" name="safer_discount" value="{{old('safer_discount') }}" required autocomplete="user_discount">

                    @error('safer_discount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="user_discount" class="col-md-4 col-form-label text-md-right">نسبة الخصم للعميل </label>

                <div class="col-md-6">
                    <input id="user_discount" type="text" class="form-control @error('user_discount') is-invalid @enderror" name="user_discount" value="{{old('user_discount') }}" required autocomplete="user_discount">

                    @error('user_discount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            @endif
            <div class="form-group row">
                <label for="phone2" class="col-md-4 col-form-label text-md-right">{{ __('public.phone2') }}</label>

                <div class="col-md-6">
                    <input id="phone" type="phone" class="form-control @error('phone2') is-invalid @enderror" name="phone2" value="{{old('phone2') }}" required autocomplete="phone">

                    @error('phone2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            @if($type == 0)

            <div class="form-group row">
                <label for="universty" class="col-md-4 col-form-label text-md-right">{{ __('public.universty') }}</label>

                <div class="col-md-6">
                    <input id="universty" type="text" class="form-control @error('universty') is-invalid @enderror" name="universty" value="{{old('universty') }}" required autocomplete="universty">

                    @error('universty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="collage" class="col-md-4 col-form-label text-md-right">{{ __('public.collage') }}</label>

                <div class="col-md-6">
                    <input id="college" type="text" class="form-control @error('college') is-invalid @enderror" name="college" value="{{old('college') }}" required autocomplete="college">

                    @error('college')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
                <div class="form-group row">
                <label for="specialist" class="col-md-4 col-form-label text-md-right">{{ __('public.specialist') }}</label>

                <div class="col-md-6">
                    <input id="specialist" type="text" class="form-control @error('specialist') is-invalid @enderror" name="specialist" value="{{old('specialist') }}" required autocomplete="specialist">

                    @error('specialist')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            @endif
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('public.password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('public.confirm_password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                </div>
            </div>
    <input type="hidden" name="type" value="{{$type}}">
            @if($type == 3)
<div class="form-group row">
                <label for="profit" class="col-md-4 col-form-label text-md-right">نسبة الربح  </label>

                <div class="col-md-6">
                    <input id="profit" value="{{old('profit') }}" type="number" class="form-control "  name="profit"  autocomplete="code">
                </div>
            </div>

            @endif
            @if($type == 6)
            <div class="form-group row">
                <label for="profit" class="col-md-4 col-form-label text-md-right"> نوع السائق  </label>

                <div class="col-md-6">
               <select class="form-control select2" name="driver_type" >
                   <option value="private" >خاص</option>
                   <option value="outside" >خارجي</option>

               </select>
                </div>
            </div>

            @endif
            @if($type == 1 || $type == 6 || $type == 4 || $type == 5 )

            <div class="form-group row">
                <label for="order_status" class="col-md-4 col-form-label text-md-right">حالات الطلب   </label>

                <div class="col-md-6">
                    <ul>
                        @foreach ($order_status as $status)
                        <li> {{$status->name}} <input type="checkbox" name="status[]" value="{{$status->id}}" /></li>

                        @endforeach

                         </ul>
                    </ul>                </div>
            </div>
            @endif
            @if($type == 1)
            <div class="form-group row">
                            <label for="profit" class="col-md-4 col-form-label text-md-right"> الصلاحيات  </label>
<?php
 $class = "order";
 ?>
                            <div class="col-md-6" >
                                <ul class="rol">
                                    <li>الطلبات <input type="checkbox" name="class[]" value="<?=$class?>" /></li>
                                <ul>
                                    <li> عرض <input type="checkbox" name="<?=$class?>_function[]" value="index" /></li>
                                    <li> اضافة <input type="checkbox" name="<?=$class?>_function[]" value="add" /></li>
                                    <li> حذف <input type="checkbox" name="<?=$class?>_function[]" value="delete" /></li>
                                    <li> تعديل <input type="checkbox" name="<?=$class?>_function[]" value="edit" /></li>
                                    <li> تصدير <input type="checkbox" name="<?=$class?>_function[]" value="export" /></li>

                                     </ul>
                                </ul>
                                <?php
 $class = "invoce";
 ?>
                                <ul class="rol">
                                    <li>الفواتير <input type="checkbox" name="class[]" value="<?=$class?>" /></li>
                                <ul>
                                    <li> عرض <input type="checkbox" name="<?=$class?>_function[]" value="index" /></li>
                                    <li> اضافة <input type="checkbox" name="<?=$class?>_function[]" value="add" /></li>
                                    <li> حذف <input type="checkbox" name="<?=$class?>_function[]" value="delete" /></li>
                                    <li> تعديل <input type="checkbox" name="<?=$class?>_function[]" value="edit" /></li>
                                    <li> تصدير <input type="checkbox" name="<?=$class?>_function[]" value="export" /></li>

                                     </ul>
                                </ul>
                                <?php
                                $class = "mail";
                                ?>
                                                               <ul class="rol">
                                                                   <li>الأيميل <input type="checkbox" name="class[]" value="<?=$class?>" /></li>
                                                               <ul>
                                                                   <li> عرض <input type="checkbox" name="<?=$class?>_function[]" value="index" /></li>
                                                                   <li> اضافة <input type="checkbox" name="<?=$class?>_function[]" value="add" /></li>
                                                                   <li> حذف <input type="checkbox" name="<?=$class?>_function[]" value="delete" /></li>
                                                                   <li> تعديل <input type="checkbox" name="<?=$class?>_function[]" value="edit" /></li>
                                                                   <li> تصدير <input type="checkbox" name="<?=$class?>_function[]" value="export" /></li>

                                                                    </ul>
                                                               </ul>
                                <?php
                                $class = "area";
                                ?>
                                <ul  class="rol">
                                    <li>المناطبق <input type="checkbox" name="class[]" value="<?=$class?>" /></li>
                                <ul>
                                    <li> عرض <input type="checkbox" name="<?=$class?>_function[]" value="index" /></li>
                                    <li> اضافة <input type="checkbox" name="<?=$class?>_function[]" value="add" /></li>
                                    <li> حذف <input type="checkbox" name="<?=$class?>_function[]" value="delete" /></li>
                                    <li> تعديل <input type="checkbox" name="<?=$class?>_function[]" value="edit" /></li>

                                     </ul>
                                </ul>

                                <?php
                                $class = "coupon";
                                ?>
                                <ul  class="rol">
                                    <li>اكواد الخصم <input type="checkbox" name="class[]" value="<?=$class?>" /></li>
                                <ul>
                                    <li> عرض <input type="checkbox" name="<?=$class?>_function[]" value="index" /></li>
                                    <li> اضافة <input type="checkbox" name="<?=$class?>_function[]" value="add" /></li>
                                    <li> حذف <input type="checkbox" name="<?=$class?>_function[]" value="delete" /></li>
                                    <li> تعديل <input type="checkbox" name="<?=$class?>_function[]" value="edit" /></li>

                                     </ul>
                                </ul>

                                <?php
                                $class = "blog";
                                ?>
                                <ul  class="rol">
                                    <li> المدونة <input type="checkbox" name="class[]" value="<?=$class?>" /></li>
                                <ul>
                                    <li> عرض <input type="checkbox" name="<?=$class?>_function[]" value="index" /></li>
                                    <li> اضافة <input type="checkbox" name="<?=$class?>_function[]" value="add" /></li>
                                    <li> حذف <input type="checkbox" name="<?=$class?>_function[]" value="delete" /></li>
                                    <li> تعديل <input type="checkbox" name="<?=$class?>_function[]" value="edit" /></li>

                                     </ul>
                                </ul>

                                <?php
                                $class = "banner";
                                ?>
                                <ul  class="rol">
                                    <li> الأعلانات <input type="checkbox" name="class[]" value="<?=$class?>" /></li>
                                <ul>
                                    <li> عرض <input type="checkbox" name="<?=$class?>_function[]" value="index" /></li>
                                    <li> اضافة <input type="checkbox" name="<?=$class?>_function[]" value="add" /></li>
                                    <li> حذف <input type="checkbox" name="<?=$class?>_function[]" value="delete" /></li>
                                    <li> تعديل <input type="checkbox" name="<?=$class?>_function[]" value="edit" /></li>

                                     </ul>
                                </ul>

                                <?php
                                $class = "product";
                                ?>
                                <ul  class="rol">
                                    <li> المنتجات <input type="checkbox" name="class[]" value="<?=$class?>" /></li>
                                <ul>
                                    <li> عرض <input type="checkbox" name="<?=$class?>_function[]" value="index" /></li>
                                    <li> اضافة <input type="checkbox" name="<?=$class?>_function[]" value="add" /></li>
                                    <li> حذف <input type="checkbox" name="<?=$class?>_function[]" value="delete" /></li>
                                    <li> تعديل <input type="checkbox" name="<?=$class?>_function[]" value="edit" /></li>

                                     </ul>
                                </ul>

                                <?php
                                $class = "category";
                                ?>
                                <ul  class="rol">
                                    <li> الأقسام <input type="checkbox" name="class[]" value="<?=$class?>" /></li>
                                <ul>
                                    <li> عرض <input type="checkbox" name="<?=$class?>_function[]" value="index" /></li>
                                    <li> اضافة <input type="checkbox" name="<?=$class?>_function[]" value="add" /></li>
                                    <li> حذف <input type="checkbox" name="<?=$class?>_function[]" value="delete" /></li>
                                    <li> تعديل <input type="checkbox" name="<?=$class?>_function[]" value="edit" /></li>

                                     </ul>
                                </ul>
                                <?php
                                $class = "faq";
                                ?>
                                <ul  class="rol">
                                    <li> الأسئلة الشائعة <input type="checkbox" name="class[]" value="<?=$class?>" /></li>
                                <ul>
                                    <li> عرض <input type="checkbox" name="<?=$class?>_function[]" value="index" /></li>
                                    <li> اضافة <input type="checkbox" name="<?=$class?>_function[]" value="add" /></li>
                                    <li> حذف <input type="checkbox" name="<?=$class?>_function[]" value="delete" /></li>
                                    <li> تعديل <input type="checkbox" name="<?=$class?>_function[]" value="edit" /></li>

                                     </ul>
                                </ul>

                                <?php
                                $class = "branch";
                                ?>
                                <ul  class="rol">
                                    <li> الفروع <input type="checkbox" name="class[]" value="<?=$class?>" /></li>
                                <ul>
                                    <li> عرض <input type="checkbox" name="<?=$class?>_function[]" value="index" /></li>
                                    <li> اضافة <input type="checkbox" name="<?=$class?>_function[]" value="add" /></li>
                                    <li> حذف <input type="checkbox" name="<?=$class?>_function[]" value="delete" /></li>
                                    <li> تعديل <input type="checkbox" name="<?=$class?>_function[]" value="edit" /></li>

                                     </ul>
                                </ul>
                                <?php
                                $class = "user";
                                ?>
                                <ul  class="rol">
                                    <li> المستخدمين <input type="checkbox" name="class[]" value="<?=$class?>" /></li>
                                <ul>
                                    <li> عرض <input type="checkbox" name="<?=$class?>_function[]" value="index" /></li>
                                    <li> اضافة <input type="checkbox" name="<?=$class?>_function[]" value="add" /></li>
                                    <li> حذف <input type="checkbox" name="<?=$class?>_function[]" value="delete" /></li>
                                    <li> تعديل <input type="checkbox" name="<?=$class?>_function[]" value="edit" /></li>
                                    <li> تصدير <input type="checkbox" name="<?=$class?>_function[]" value="export" /></li>

                                     </ul>
                                </ul>


                            </div>
                        </div>

                        @endif

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
@endsection
