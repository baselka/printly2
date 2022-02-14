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
                            <h2 class="content-header-title float-left mb-0">المناطق والجامعات</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">{{__('public.home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('area')}}">المناطق والجامعات</a>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <a class="btn btn-success" href="{{route('add-area')}}">{{__('public.add')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">المناطق والجامعات</h4>
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


                <div class="card-body">
                    <section id="data-list-view" class="data-list-view-header">


                        <div class="table-responsive">
                            <table class="table data-list-view">                        <thead>
                        <tr>
                            <th scope="col">#{{__('public.id')}}</th>
                            <th scope="col">{{__('public.name')}}</th>
                            <th scope="col">{{__('public.price')}}</th>
                            <th scope="col">{{__('public.precent')}}</th>

                            <th scope="col">{{__('public.edit')}}</th>
                            <th scope="col">{{__('public.delete')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                          @if($area)
                        @foreach($area as $a)
                            <tr>
                                <th scope="row">{{$a->id}}</th>
                                <td class="editable_name" table="area" el_id="{{$a->id}}">{{$a->name}}</td>
                                <td class="editable_price" el_id="{{$a->id}}">{{$a->price}}</td>
                                <td>{{$a->precent}}</td>

                                <td><a href="{{route('edit-area', ['id' =>$a->id ])}}">{{__("public.edit")}}</a></td>
                                <td><a href="{{route('delete-area', ['id' =>$a->id ])}}">{{__("public.delete")}}</a></td>

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
