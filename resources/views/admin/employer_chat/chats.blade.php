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
                            <h2 class="content-header-title float-left mb-0">الدردشة</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">{{__('public.home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('chats')}}">الدردشة</a>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">

                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-success waves-effect waves-light" data-toggle="modal" data-target="#inlineForm">
                                اضافة دردشة
                            </button>
                                                </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">التذاكر</h4>
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
                            {{-- <th scope="col">#{{__('public.id')}}</th> --}}
                            <th scope="col">{{__('public.name')}}</th>
                            {{-- <th scope="col">{{__('public.message')}}</th> --}}
                            <th scope="col">{{__('public.date')}}</th>


                            <th scope="col">{{__('public.show')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                          @if($chats)
                        @foreach($chats->items() as $chat)
                            <tr>
                                {{-- <th scope="row">{{$chat->id}}</th> --}}
                                <td>{{App\Http\Controllers\ProfileController::get_user_info($chat->rec)->name}}</td>

                                {{-- <td>{{$chat->message}}</td> --}}
                                <td>{{$chat->date}}</td>

                                <td><a href="{{route('show_chat', ['id' =>$chat->id ])}}">{{__("public.show")}}</a></td>

                            </tr>
                        @endforeach
                      @endif
                        </tbody>
                    </table>
                    {{-- {{ $chats->links() }} --}}
                        </div>
                    </section>
                </div>
            </div>
        </div>

    </div>
    </div>
    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">اضافة محادثة جديدة </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('store_chat')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label > الشخص </label>

                        <select class="form-group select2" name="user">
                            @foreach ($users as $user)
                          <option value="{{$user->id}}" >{{$user->name}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >اضافة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
