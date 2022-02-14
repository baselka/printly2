@extends('layouts.admin')
@section('content')




<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">القائمة البريدية</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{__('public.home')}}</a>
                        </li>


                    </ol>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
		  <div class="card mb-4">

                <div class="card-body">
                    <form method="POST" action="{{ route('send-mail')}}" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group row">


                                <label for="price" class="col-lg-2 col-md-6  col-form-label text-md-right">العنوان</label>
                                <div class="col-lg-6 col-md-7">

                                  <input type="text" name="subject" class="form-control" />

                                @error('subject')
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
