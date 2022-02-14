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
                    قبل المتابعة ، يرجى التحقق من بريدك الإلكتروني للحصول على رابط التحقق. إذا لم تتلق البريد الإلكتروني ،
اضغط هنا اذ لم تحصل علي البريد الالكتروني                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">الحصول علي بريد اخر</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
