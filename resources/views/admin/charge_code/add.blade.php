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
                            <h2 class="content-header-title float-left mb-0">{{__('public.charge_codes')}}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">{{__('public.home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('charge_codes')}}">{{__('public.charge_codes')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="{{route('add-chargecode')}}">{{ __('public.add') }}</a>
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
                    <form method="POST" action="{{ route('add-chargecode')}}" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">كود الشحن </label>

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
                            <label for="money" class="col-md-4 col-form-label text-md-right"> المبلغ </label>

                            <div class="col-md-6">
                                <input id="money" type="text" class="form-control @error('money') is-invalid @enderror" name="money" placeholder="المبلغ" value="{{ old('money') }}" required autocomplete="money" autofocus>

                                @error('money')
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
