@extends('layouts.app')

@section('content')

<style>
    .select-parent::after {
    content: '\f0dd';
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    position: absolute;
    left: 15px;
    bottom: 15px;
}
    </style>
<style>
    .home-layout{
        background-color: white;
    }
    .list-inline-item{
        padding: 20px;
    }
    .item{
        float: left;
    }
</style>
        </header>
        <div class="page-content text-center ">
            <div class="container">


                    <div class="row col-sm-12">
                        <div class="col-sm-3">
                            <button class="btn" style="margin-left:10px">
                                <i class="fa-solid fa-filter"></i>               </button>      <button class="btn">
                                <i class="fa-solid fa-list"></i>                    </button>
                        </div>
                        <div class="col-sm-3">

                        <select class="form-control selectM" style="min-height: 50px;border-color:#ccc;color:#ccc" onchange="location = this.value;" id="p2">
                            <option>التصفيات</option>
                <option>التصفيات</option>
                <option>التصفيات</option>
                <option>التصفيات</option>
                <option>التصفيات</option>

                </select>
                        </div>
                <div class="col-sm-6">
                    <form class="search" style="position: relative">

                    <input style="border-color:#ccc;min-height:50px" class="form-control @error('search') is-invalid @enderror" type="text" name="search" value="{{ old('search') }}" required autocomplete="search" autofocus id="f1" placeholder="  ابحث هنا ..." >
                    <button  class="searchbtn" type="submit"><i  style="color:white" class="fa fa-search"></i></button>

                    @error('search')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                </form>
                    </div>
                </div>
<div class="col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                      <li class="breadcrumb-item"><a href=".store">المتجر</a></li>
                     @if($cat) <li class="breadcrumb-item"><a href="/store?cat={{$cat->id}}">{{$cat->name}}</a></li>@endif

                      <li class="breadcrumb-item active" aria-current="page">{{$module->name}}</li>
                    </ol>
                  </nav>
</div>
                  <h3 class="mb-4 h1" style="color:#EE4681">{{$module->name}}</h3>
                <div class="home-layout-4 home-layout">
                    <div class="row ">

                        @foreach ($products as $product)

         <div class="item col-lg-3 col-6">
                                    <div class="h-section-4 mb-3">

                                        <div class="image " style="position: relative">
                                            <a href="{{route('product',['id'=>$product->id])}}"><img src="{{'/uploads/products/'.$product->image}}"></a>
                                            <a href="{{route('product',['id'=>$product->id])}}" class="btn"><img src="{{URL::to('/')}}/img/icons/text-file.png" alt="file"> التفاصيل </a>
                                                <span class="topright">جديد</span>
                                        </div>
                                        <div class="flex-container">
                                            <div class="text">
                                                <h5><a href="{{route('product',['id'=>$product->id])}}">{{$product->product_name}}</a></h5>
                                                <p>{{ $product->short_desc }}</p>
                                            </div>
                                               <div class="price"> ريال <p>{{$product->price}}</p></div>
                                        </div>
                                    </div>
                                    <div class="quantity mb-3">
                                        <label class="float-right">الكمية</label>
                                        <input class="cart_q{{$product->id}} number" type="number" value="1" min="1">
                                   </div>
                                    <div class="buttons mb-3">
                                        <a href="#"><img src="{{URL::to('/')}}/img/icons/share.png"></a>
                                        <div class="pretty-checkbox">
                                            <div class="pretty p-icon p-toggle p-plain">
                                                <input type="checkbox" checked/>
                                                <div class="state p-on">
                                                    <i class="icon fas fa-heart"></i>
                                                    <label></label>
                                                </div>
                                                <div class="state p-off">
                                                    <i class="icon far fa-heart"></i>
                                                    <label></label>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)" @if(App\Http\Controllers\StoreController::checkIfInCart($product->id)) style="background-color: #ffd761" @endif onclick="cart.add({{$product->id}}, $('.cart_q{{$product->id}}').val() , 0)" class="btn add-to-cart">
                                            <img src="{{URL::to('/img/icons/cart-sm.png')}}">
                                            <span>@if(App\Http\Controllers\StoreController::checkIfInCart($product->id)) تمت اضافته الي السلة @else أضف إلى السلة @endif</span>
                                        </a>
                                    </div>

                                </div>
                                @endforeach
                            </div>

            </div>
            <!--End-->




    </div>
</div>
@endsection
