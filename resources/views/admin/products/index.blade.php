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
                            <h2 class="content-header-title float-left mb-0">المنتجات</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">{{__('public.home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('products')}}">المنتجات</a>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <a class="btn btn-success" href="{{route('add-product')}}">{{__('public.add')}}</a>
                        </div>
                        <div class="dropdown">
                            <a class="btn btn-success" href="{{route('add-product',['type'=>1])}}">اضافة ملزمة</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">المنتجات</h4>
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

                    <section id="data-thumb-view" class="data-thumb-view-header">


                <div class="table-responsive">
                    <table class="table data-thumb-view">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">الصوره</th>

                            <th scope="col">{{__('public.name')}}</th>
                            <th scope="col">{{__('public.status')}}</th>
                            <th scope="col">الكمية</th>
                            <th scope="col">السعر</th>

                            <th scope="col">{{__('public.edit')}}</th>
                            <th scope="col">{{__('public.delete')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                          @if($products)
                        @foreach($products as $product)
                            <tr>
<td></td>
                                <td class="product-img"><img src="{{URL::to('/uploads/products/'.$product->image)}}" alt="Img placeholder">
                                </td>
                                <td>{{$product->product_name}}</td>
                                <td>@if($product->accepted == 1)مفعل  @else غير مفعل @endif </td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->price}}</td>

                                <td><a href="{{route('edit-product', ['id' =>$product->id ])}}">{{__("public.edit")}}</a></td>
                                <td><a href="{{route('delete-product', ['id' =>$product->id ])}}">{{__("public.delete")}}</a></td>

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
