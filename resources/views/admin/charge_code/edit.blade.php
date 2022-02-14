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


            @if(session()->has('success'))
            <script>
                $(document).ready(function () {

                Swal.fire(
    '{{__("public.good_job")}}',
    "{{ session()->get('success') }}",
    'success'
    );
                });
            </script>

            @endif
            @if(session()->has('error') || $errors->any())
            {{-- @dd($errors); --}}
            <script>
            $(document).ready(function () {
                Swal.fire(
                    '{{__("public.faild_job_job")}}',

    "",
    'error'
    );
    });
            </script>
            @endif


            <div class="card-content">
                <div class="card-body">
                    <form method="POST" action="{{ route('update-chargecode' , ['id'=>$code->id])}}" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">كود الشحن </label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code"  value="{{ $code->code }}" required autocomplete="code" autofocus>

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
                                <input id="money" type="text" class="form-control @error('money') is-invalid @enderror" name="money" placeholder="المبلغ" value="{{ $code->amount }}" required autocomplete="money" autofocus>

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
                                <input id="date_start" type="date" class="form-control @error('date_start') is-invalid @enderror" name="date_start"  value="{{ $code->date_start }}" required autocomplete="date" autofocus>

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
                                <input id="date_end" type="date" class="form-control @error('date_end') is-invalid @enderror" name="date_end"  value="{{ $code->date_end }}" required autocomplete="date_end" autofocus>

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
                                <input id="uses_customer" type="number" class="form-control @error('uses_customer') is-invalid @enderror" name="uses_customer"  value="{{ $code->uses_number }}" required autocomplete="uses_customer" autofocus>

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
                                    {{ __('public.update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <h3>مستخدمين الكود</h3>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>الرقم التسلسلي</th>
                                    <th>العميل</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($customers as $customer)
                                <td>{{$i++}}</td>
                                <td>{{$customer->name}}</td>

                                @endforeach
                                <tr>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

@endsection
