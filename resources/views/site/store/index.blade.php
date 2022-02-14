@extends('layouts.app')

@section('content')
<style>
    .home-layout{
        background-color: white;
    }
    .list-inline-item{
        padding: 20px;
    }
</style>
        </header>
        <div class="page-content text-center ">
            <div class="container">
<div class="row col-sm-12">
        <div class="col-sm-4">
<div class="selectM">
        <select class="form-control" style="min-height: 50px;border-color:#ccc;color:#ccc" onchange="location = this.value;" id="p2">
            <option>التصفيات</option>
<option>التصفيات</option>
<option>التصفيات</option>
<option>التصفيات</option>
<option>التصفيات</option>

</select>
</div>
        </div>
<div class="col-sm-6">
<form class="search" style="position: relative">

    <input style="border-color:#ccc;min-height:50px" value="{{request()->get("search")}}" class="form-control @error('search') is-invalid @enderror" type="text" name="search" value="{{ old('search') }}"  autocomplete="search" autofocus id="f1" placeholder="  ابحث هنا ..." >
    <button class="searchbtn" type="submit"><i  style="color:white" class="fa fa-search"></i></button>

    @error('search')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

</form>
    </div>
</div>



        <ul class="list-inline">
            @foreach ($categories as $category)

            <li class="list-inline-item mb-4 h1">
                <a  @if(request()->query("cat") == $category->id) style="color:#a7c8ff" @endif href="{{route('store',['cat'=>$category->id])}}">{{$category->name}}</a>
            </li>
            @endforeach

        </ul>

            @if($banners)
<div class="custom-layout">
<div class=" slideshow-container" >

    @foreach($banners as $banner)

        <div class="mySlides fadeslider"> <a href="{{$banner->link}}"> <img  style="max-height:300px" src="{{URL::to('/uploads/banners/'.$banner->photo)}}"></a>
        </div>

@endforeach
<a class="prevslider" style="left: 10%" onclick="plusSlides(-1)"><i style="margin-top: 7px" class="fas fa-chevron-left"></i></a>
<a class="nextslider" onclick="plusSlides(1)"><i style="margin-top: 7px" class="fas fa-chevron-right"></i></a>

    </div>
</div>
@endif
{{-- @if($banners)
<div class="custom-layout">
    <div class="text-center">
<div class="owl-carousel owl-theme" id="banner-slider">

    @foreach($banners as $banner)

        <div class="item h-section-2 text-center"> <a href="{{$banner->link}}"> <img src="{{URL::to('/uploads/banners/'.$banner->photo)}}"></a>
        </div>

@endforeach

</div>
    </div>
</div>
@endif --}}
<?php
$has_product = false;
?>
        @foreach ($modules as $module)
                <!--Start Products-->
@if($module["products"])
<?php
$has_product = true;
?>
        <div class="home-layout-4 home-layout">
            <div class="container">
                <div class="clearfix">
                    <div class="head-title float-start">
                        <h2 style="color:#EE4681">{{$module["name"]}}</h2>
                    </div>
                    <div class="float-end">
                        <a href="{{route('module_products',['id'=>$module["id"],'cat'=>request()->query("cat")])}}" class=""> عرض الكل</a>
                    </div>
                </div>
                <div class="owl-carousel owl-theme owl-carousel-classic">
                    @foreach ($module["products"] as $product)
                <div class="item">
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
                            <div class="price"> ريال
                                <p>{{$product->price}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="quantity mb-3">
                        <label class="float-right">الكمية</label>
                        <input class="cart_q{{$product->id}} number" type="number" value="1" min="1">
                    </div>
                    <div class="buttons mb-3">
                        <a href="{{route('product',['id'=>$product->id])}}"><img src="{{URL::to('/img/icons/share.png')}}"></a>
                        <div class="pretty-checkbox">
                            <div class="pretty p-icon p-toggle p-plain">
                                <input type="checkbox"  onclick="wishlist.add({{$product->id}}, 1 , 0)" />
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
                        <a href="javascript:void(0)" onclick="cart.add({{$product->id}}, $('.cart_q{{$product->id}}').val() , 0)" class="btn add-to-cart">
                            <img src="{{URL::to('/img/icons/cart-sm.png')}}">
                            <span>أضف إلى السلة</span>
                        </a>
                    </div>
                </div>
@endforeach

            </div>
        </div>
    </div>
    <!--End-->
    @endif

        @endforeach
        @if($has_product == false)
        <div class="container">
            <div class="text-center">
                <img src="./img/icons/tick-inside-circle.png" alt="">
                <h2 class="my-5">نأسف  لا يوجد نتائح بحث</h2>
                <a style="min-width: 250px;" href="/store" class="btn main-btn btn-lg">تصفح منتجاتنا</a>
            </div>
        </div>
        <script>
            $(".custom-layout").remove();
        </script>
        @endif




    </div>
</div>
@endsection
