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
                            <h2 class="content-header-title float-left mb-0">الطلبات </h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">{{ __('public.home') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('orders') }}">الاوردات </a>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card">


            @if (session()->has('success'))
                <script>
                    $(document).ready(function() {

                        Swal.fire(
                            '{{ __('public.good_job') }}',
                            "{{ session()->get('success') }}",
                            'success'
                        );
                    });

                </script>

            @endif
            @if (session()->has('error') || $errors->any())
                {{-- @dd($errors); --}}
                <script>
                    $(document).ready(function() {
                        Swal.fire(
                            '{{ __('public.faild_job_job') }}',

                            "",
                            'error'
                        );
                    });

                </script>
            @endif


            <div class="card-content">
                <div class="card-body">


{!! \App\Http\Controllers\OrderController::get_driver_invoce($invoce->id)!!}


                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
