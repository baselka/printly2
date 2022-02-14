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
                            <th scope="col">#{{__('public.id')}}</th>
                            <th scope="col">{{__('public.name')}}</th>
                            <th scope="col">{{__('public.driver')}}</th>

                            <th scope="col">{{__('public.date')}}</th>

                            <th scope="col">{{__('public.show')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                          @if($invoces)
                        @foreach($invoces as $invoce)
                            <tr>
                                <th scope="row">{{$invoce->id}}</th>
                                <td>{{$invoce->name}}</td>
                                 <td>{{$invoce->driver ? App\Http\Controllers\ProfileController::get_user_info($invoce->driver)->name : ''}}</td>
                                 <td>{{$invoce->created_at}}</td>

                                <td><a href="{{route('show_driverinvoce', ['id' =>$invoce->id ])}}">{{__("public.show")}}</a></td>

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


@endsection
