@extends('layouts.admin')
@section('content')






                <div class="content-header-left col-md-9 col-12 mb-2">
    <h1 class="h3 mb-0 text-gray-800">Email</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
   </ol>
  </div>
		  <div class="card mb-4">

                <div class="card-body">
                    <form method="POST" action="{{ route('send-mail')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">

                        <label  class="col-lg-2 col-md-3 col-form-label text-md-right">كل العملاء</label>
                        <div class="col-lg-6 col-md-7">

                        <input type="checkbox" class="selectAll form-control" value="1" />
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="accepted" class="col-lg-2 col-md-3 col-form-label text-md-right">العملاء </label>


                            <div class="col-lg-6 col-md-7">

                                <select class=" form-control select2" multiple name="user[]" >
                                    <optgroup label="Customers">


                                    @foreach($users as $user)
                                        <option value="{{$user->email}}">{{$user->email}}--{{$user->name}} </option>
@endforeach
                                    </optgroup>
                                </select>

                                @error('user')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>
                        
                        <div class="form-group row">
                            <label for="short_desc" class="col-lg-2 col-md-3 col-form-label text-md-right">الايميلات</label>

                            <div class="col-lg-6 col-md-7">
                                <input id="emails" type="text" class="form-control @error('emails') is-invalid @enderror" name="emails" value="{{old('emails') }}" required autocomplete="emails" autofocus>

                                @error('emails')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-lg-2 col-md-6  col-form-label text-md-right">التفاصيل</label>

                            <div class="col-lg-6 col-md-7">
                                <textarea id="desc" type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" required autocomplete="price" ></textarea>

                                @error('desc')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('public.send') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
            </div>

@endsection