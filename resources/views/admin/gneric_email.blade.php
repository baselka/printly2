@extends('layouts.admin')
@section('content')




<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">الايميل</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{__('public.home')}}</a>
                        </li>


                    </ol>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
		  <div class="card mb-4">

                <div class="card-body">
                    <form method="POST" action="{{ route('send-mail')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="accepted" class="col-lg-2 col-md-3 col-form-label text-md-right">العملاء </label>


                            <div class="col-lg-6 col-md-7">

                                <select class=" form-control select2"  name="user" >
                                    <optgroup label="Customers">


                                        <option value="all_user">كل العملاء </option>
                                        <option value="never_order"> الذين لم يطلبوا  ابدا </option>
                                        <option value="uncomplete_order"> الذين لم يكملوا طلبلهم</option>

                                    </optgroup>
                                </select>

                                @error('user')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="accepted" class="col-lg-2 col-md-3 col-form-label text-md-right"> ارسال حسب المدينه  او الحامعة  </label>


                            <div class="col-lg-6 col-md-7">

                                <select class=" form-control select2" multiple name="city_uni[]" >
                                    <optgroup label="المدن والجامعات">
<option value="all">جميع المدن</option>
                                        @foreach ($countris as $country)
<option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach


                                    </optgroup>
                                </select>

                                @error('user')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="accepted" class="col-lg-2 col-md-3 col-form-label text-md-right"> حسب المنطقه او الكلية    </label>


                            <div class="col-lg-6 col-md-7">

                                <select class=" form-control select2" multiple name="areas[]" >
                                    <optgroup label="المناطق او الجامعات">
<option value="all"> كل المناطق او الكليات</option>
@foreach ($area as $ar)
<option value="{{$ar->id}}">{{$ar->name}}</option>
                                        @endforeach


                                    </optgroup>
                                </select>

                                @error('user')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">


                            <div class="col-lg-6 col-md-7">
                                  <input type="text" name="subject" class="form-control" />

                                @error('subject')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="short_desc" class="col-lg-2 col-md-3 col-form-label text-md-right">الايميلات</label>

                            <div class="col-lg-6 col-md-7">
                                <input id="emails" type="text" class="form-control @error('emails') is-invalid @enderror" name="emails" value="{{old('emails') }}" required autocomplete="emails" autofocus>

                                @error('emails')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-lg-2 col-md-6  col-form-label text-md-right">التفاصيل</label>

                            <div class="col-lg-6 col-md-7">
                                <textarea id="desc" type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" required autocomplete="price" ></textarea>

                                @error('desc')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('public.send') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
            </div>

@endsection
