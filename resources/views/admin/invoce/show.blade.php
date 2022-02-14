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
                            <h2 class="content-header-title float-left mb-0">الفواتير </h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">{{ __('public.home') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('invoce') }}">الفواتير </a>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="content-body">

            <div class="col-md-6 col-12">
                <div class="card">


                    <form class="form" action="{{ route('update_invoce', ['id' => $invoce->id]) }}" method="post"
                        enctype="multipart/form-data">

                        @csrf

                        <label>رقم الطلب </label>

                        <select class="form-group select2" name="order_id[]" multiple>
                            @foreach ($orders as $o)
                                <option value="{{ $o->id }}">{{ $o->id }}-{{ $o->name }}</option>

                            @endforeach
                        </select>

                        <label>اشعار السائق</label>
                        <input type="checkbox" name="notify" value="1" ?>
                        <input class="btn-success btn" type="submit" name="add" value=" اضافة طلب للفاتوره" />

                    </form>




                </div>
            </div>
            <form class="form" action="{{ route('update_invoce_status', ['id' => $invoce->id]) }}" method="post"
                enctype="multipart/form-data">

                @csrf
                <div class="col-md-6">
                    <label>حالة الفاتورة</label>

                    <select class="form-group select2" name="status">
                        <option value="1">مسددة</option>
                        <option value="0">غير مسددة</option>

                    </select>
                </div>

                <input class="btn-success btn" type="submit" name="add" value=" تحديث حالة الفاتورة" />

            </form>
            <hr>

        </hr>
            {!! App\Http\Controllers\OrderController::get_driver_invoce($invoce->id) !!}

        </div>

    </div>
    </div>
@endsection
