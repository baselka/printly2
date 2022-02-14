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
                            <h2 class="content-header-title float-left mb-0">الصفحات الثابتة</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">{{__('public.home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('pages')}}">الصفحات الثابتة</a>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <a class="btn btn-success" href="{{route('add-page')}}">{{__('public.add')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">الصفحات الثابتة</h4>
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
                            <!-- <th scope="col">#{{__('public.id')}}</th> -->
                            <th scope="col">{{__('public.name')}}</th>
                            <th scope="col">{{__('public.status')}}</th>

                            <th scope="col">{{__('public.edit')}}</th>
                            <!-- <th scope="col">{{__('public.delete')}}</th> -->

                        </tr>
                        </thead>
                        <tbody>
                          @if($blogs)
                        @foreach($blogs as $blog)
                            <tr>
                                <!-- <th scope="row">{{$blog->id}}</th> -->
                                <td>{{$blog->name}}</td>
                                <td>@if($blog->accepted == 1)مفعل  @else غير مفعل @endif </td>

                                <td><a href="{{route('edit-page', ['id' =>$blog->id ])}}">{{__("public.edit")}}</a></td>
                                <!-- <td><a href="{{route('delete-page', ['id' =>$blog->id ])}}">{{__("public.delete")}}</a></td> -->

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

@endsection
