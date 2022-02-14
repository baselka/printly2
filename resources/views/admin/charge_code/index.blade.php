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
                            <h2 class="content-header-title float-left mb-0"> {{__('public.charge_codes')}}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">{{__('public.home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('charge_codes')}}"> {{__('public.charge_codes')}} </a>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <a class="btn btn-success" href="{{route('add-chargecode')}}">{{__('public.add')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{__('public.charge_codes')}}</h4>
            </div>


            <div class="card-content">


                <div class="card-body">
                    <section id="data-list-view" class="data-list-view-header">


                        <div class="table-responsive">
                            <table class="table data-list-view">                        <thead>
                        <tr>
                            <th scope="col">#{{__('public.id')}}</th>
                      <th scope="col">{{__('public.code')}}</th>

                            <th scope="col">{{__('public.status')}}</th>
                            <th scope="col">يبدا من</th>
                            <th scope="col">ينتهي عند</th>
                            <th scope="col">أقصي  مرات الأستخدام</th>
                            <th scope="col"> المبلغ</th>

                            <th scope="col">{{__('public.edit')}}</th>
                            <th scope="col">{{__('public.delete')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                          @if($charge_code)
                        @foreach($charge_code as $code)
                            <tr>
                                <th scope="row">{{$code->id}}</th>
                                <td>{{$code->code}}</td>
                                <td>@if($code->status == 1) مفعل @else غير مفعل @endif</td>
                                <td>{{$code->date_start}}</td>
                                <td>{{$code->date_end}}</td>
                                <td>{{$code->uses_number}}</td>
                                <td>{{$code->amount}}</td>

                                <td><a href="{{route('edit-chargecode', ['id' =>$code->id ])}}">{{__("public.edit")}}</a></td>
                                <td><a href="{{route('delete-chargecode', ['id' =>$code->id ])}}">{{__("public.delete")}}</a></td>

                            </tr>
                        @endforeach
                      @endif
                        </tbody>
                    </table>
                        </div></section>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
