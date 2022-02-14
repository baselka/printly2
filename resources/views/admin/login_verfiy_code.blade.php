@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تحقق من عنوان بريدك الإلكتروني</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <form class="d-inline" method="GET" action="{{ route('verfied_login_code') }}">
                        @csrf
                        <input type="text" class="form-control" name="code" placeholder="الكود" />

                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">تفعيل تسجيل الدخول</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
