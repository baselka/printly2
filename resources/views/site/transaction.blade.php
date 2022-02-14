@extends('layouts.app')

@section('content')
    </header>
      <!--Start Page Content-->
      <div class="page-content orders-page">
        <div class="container">
            <div class="blue-layout">
                <div class="blue-title text-center">
                    <h2>سجل العمليات</h2>
                </div>


                <div class="table-responsive">
                    <table class="table table-2">
                        <tbody>
                            @foreach($transactions as $tran)
                            <tr>
                                <td class="text-center">
                                    <span class="gray-color bold opacity-05"> {{$tran->created_at}}</span>
                                    <h4 class="pink-color mt-3"> {{$tran->id}} #</h4>
                                </td>
                                <td class="text-center">
                                    <span class="gray-color bold" style="opacity: 0.5;">  السبب</span>
                                    <h4 class="mt-3"> {{$tran->reason}}</h4>
                                </td>
                                <td class="text-center">
                                    <span class="gray-color bold" style="opacity: 0.5;">  المبلغ</span>
                                    <h4 class="mt-3"> {{$tran->amount}}</h4>
                                </td>


                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--End-->
@endsection
