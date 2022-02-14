@extends('layouts.admin')
@section('content')



<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{__('public.edit')}}</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">{{__('public.home')}}</a></li>
      <li class="breadcrumb-item">الصفحات الثابتة</li>
      <li class="breadcrumb-item active" aria-current="page">{{__('public.edit')}}</li>
    </ol>
  </div>
  <div class="card mb-4">

        <div class="card-body">
            <form method="POST" action="{{ route('update-page' , ['id'=>$blog->id])}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-lg-2 col-md-3 col-form-label text-md-right">{{ __('public.name') }}</label>

                    <div class="col-lg-6 col-md-7">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value=" {{$blog->name}} " required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-lg-2 col-md-3  col-form-label text-md-right">{{ __('public.desc') }}</label>

                    <div class="col-lg-6 col-md-7">
                        <textarea id="desc" type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" required autocomplete="desc" autofocus>{{$blog->desc}}</textarea>

                        @error('desc')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="photo" class="col-lg-2 col-md-3  col-form-label text-md-right">{{ __('public.photo') }}</label>

                    <div class="col-lg-6 col-md-7">
                        <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo"  autocomplete="photo" autofocus>
                        <input type="hidden" name="old_photo" value="{{$blog->image}}" />
                        <img style="width:150px;height:150px" src="{{URL::to('/uploads/pages/'.$blog->image)}}" /> 

                        @error('photo')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    <div class="form-group row">
        <label for="accepted" class="col-lg-2 col-md-3  col-form-label text-md-right">حالة المنتج</label>


        <div class="col-lg-6 col-md-7">

            <select class="select2 form-control" name="accepted" >
                <optgroup label="حالة المنتج">


                    <option value="1" @if($blog->accepted == 1) selected @endif> مفعل</option>

                    <option value="0" @if($blog->accepted == 0) selected @endif>غير مفعل  </option>
                </optgroup>
            </select>

            @error('accepted')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
                <div class="form-group row mb-0">
                    <div class="col-lg-6 col-md-7 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('public.update') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
