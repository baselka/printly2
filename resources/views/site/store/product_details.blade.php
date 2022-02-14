@extends('layouts.app')

@section('content')

    <style>
        .home-layout {
            background-color: white;
        }

        .list-inline-item {
            padding: 20px;
        }

        .price p {
            font-size: 30px;
            font-family: bahij-bold;
            text-align: center;
    color: #A7C8FF;

        }
        .flex-container{
            display: flex;
            flex-direction: row;
            align-items: center;
        }

    </style>
    </header>

    <!--start page content-->
    <div class="page-content">
        <div class="container">
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/store">المتجر</a>
                                        </li>
                                        <li class="breadcrumb-item"><a
                                                href="{{ route('blogs') }}">{{ $product->category }}</a>
                                        </li>
                                        <li class="breadcrumb-item"><a
                                                href="{{ route('blogs') }}">{{ $product->name }}</a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row home-layout-4" style="background-color: white">
                <div class="col-md-5">

                <div class="h-section-4 mb-3">

                    <div class=" slideshow-container" >
@foreach ($product->multi_images as $img)
<div class="mySlides fadeslider" style="position: relative"> <a href=""> <img  style="max-height:100%;width:100%" src="{{URL::to("/uploads/products").'/'.$img}}"></a>
    <span class="topright">جديد</span>

</div>


@endforeach


                     <div class="op text-center">
                                <?php $i =1 ?>
                                @foreach ($product->multi_images as $img)

                                <span class="dotslider" onclick="currentSlide({{$i}})"></span>
                                <?php $i++; ?>
                                @endforeach


                              </div>

                        </div>

                    </div>
                </div>


                <div class="col-md-7">

                    <h5>اسم المنتج</h5>
                    <h3 class="pink-color mb-4 ">
                        {{ $product->name }} </h3>
                    <h5> تفاصيل</h5>

                    <p>{!! $product->desc !!} </p>

                    <div class="mb-4 ">
                        <div class="row ">
                            <h3 class="pink-color mb-4 ">
                                لون الطباعة
                            </h3>
                            <div class="radio-container style-1 printer_color">

                                <div class="radio-container style-1 ">
                                    <div class="pretty p-icon p-toggle p-smooth p-plain black-white ">
                                        <input type="radio" class="porps" name="color" />
                                        <div class="state ">
                                            <span class="icon ">أبيض و أسود</span>
                                            <label></label>
                                        </div>
                                    </div>
                                    <div class="pretty p-icon p-toggle p-smooth p-plain colors ">
                                        <input type="radio" name="color>
                                        <div class="state ">
                                            <span class="icon ">ألــــوان</span>
                                            <label></label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                                        <div class="mb-4 ">
                        <h3 class="pink-color mb-4 ">
                            تخطيط الصفحة
                        </h3>
                        <div class="radio-container style-2 ">
                            @foreach ($product->covers as $cover)
                                <div class="pretty p-icon p-toggle p-smooth p-plain ">
                                    <input type="radio" name="cover" value="{{ $cover->id }}" checked="checked">
                                    <div class="state ">
                                        <span class="icon">
                                            <img src="{{ $cover->photo }}">
                                        </span>
                                        <label></label>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>


<div class="flex-container">

    <div class="text" style="padding-left: 10px">
        <h5>السعر</h5>
    </div>
    <div class="price"  style="width:30%">
        <p>{{ $product->price }} ريال</p>
    </div>

    <div class="text text-center" style="width:30%;padding-left:10px">
        <h5>الكمية</h5>
    </div>
    <div class="quantity" style="width:80%">
        <input class="cart_q{{ $product->product_id }} number" type="number" value="1" min="1">
    </div>
</div>



                    <div class="buttons">

                        <a style="width: 8%" href="{{ route('product', ['id' => $product->product_id]) }}"><img
                                src="{{ URL::to('/') }}/img/icons/share.png"></a>

                        <div class="pretty-checkbox">
                            <div class="pretty p-icon p-toggle p-plain">
                                <input type="checkbox" onclick="wishlist.add({{ $product->product_id }}, 1 , 0)" />
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

                        <a  href="javascript:void(0)" style="margin-right:0" @if(App\Http\Controllers\StoreController::checkIfInCart($product->product_id)) style="background-color: #ffd761;"  @endif
                            onclick="cart.add({{ $product->product_id }}, $('.cart_q{{ $product->product_id }}').val() , 0)"
                            class="btn add-to-cart">
                            <img src="{{ URL::to('/') }}/img/icons/cart-sm.png">
                            <span>@if(App\Http\Controllers\StoreController::checkIfInCart($product->product_id)) تمت اضافته الي السلة @else أضف إلى السلة @endif</span>
                        </a>
                    </div>
                </div>



            </div>
            <div class="row home-layout">
                <div class="col-md-6">
                    <div class="mb-4 ">
                        <h3 class="pink-color mb-4 "> مراجعات العملاء</h3>
                    </div>
                    <div class="mb-4 ">
                        <div class="clearfix">
                            <div class="float-start">
                                <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    + اكتب مراجعتك
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 ">
                        <style>
                            .list-inline-item{
                                padding: 0;
                                margin-left: 0;
                            }
                        </style>
                        @foreach ($product->reviews as $review)


                        <div class="row" style="padding-bottom: 10px">
                            <div class="col-md-2" style="padding: 0"> <img  class="img-fluid rounded float-left" style="max-height: 100px;width:90%" src="{{ $review->profile_image }}"></div>
                            <div class="col-sm-9 pull-right justify-content">
                                <ul class="list-inline ">
                                    <li class="list-inline-item mb-2">
                                        {{$review->user_name}}
                                    </li>
                                    <li class="list-inline-item mb-2">
                                        <div class="rating2">
                                            <input type="radio" value="5"  @if($review->rating == 5) checked="checked"   @endif  class="star-1"
                                                id="star-6">
                                            <label class="star-1" for="star-6"></label>
                                            <input type="radio" value="4" @if($review->rating == 4) checked="checked"  @endif  class="star-2"
                                                id="star-7">
                                            <label class="star-2" for="star-7"></label>
                                            <input type="radio" value="3" @if($review->rating == 3) checked="checked"  @endif  class="star-3"
                                                id="star-8">
                                            <label class="star-3" for="star-8"></label>
                                            <input type="radio" value="2" @if($review->rating == 2) checked="checked" @endif  class="star-4"
                                                id="star-9">
                                            <label class="star-4" for="star-9"></label>
                                            <input type="radio" value="1" @if($review->rating == 1) checked="checked"  @endif  class="star-5" checked
                                                id="star-10">
                                            <label class="star-5" for="star-10"></label>
                                            <span></span>
                                        </div>
                                    </li>
                                    <li class="list-inline-item mb-2">
                                        {{$review->date}}</li>
                                </ul>
                                <p>{{$review->comment}}</p>
                            </div>

                        </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-5 text-center align-center">
                            <h4 class="mb-4 ">التقييم العام</h4>
                            <h4 class="mb-4 "> {{round($product->med_rate,1)}}</h4>
                                <div class="rating2 ">
                                    <input type="radio" value="5" @if(round($product->med_rate) == 5) checked="checked"   @endif name="cover_rate" class="star-1"
                                        id="star-6">
                                    <label class="star-1" for="star-6"></label>
                                    <input type="radio" value="4" @if(round($product->med_rate) ==4) checked="checked"   @endif name="cover_rate" class="star-2"
                                        id="star-7">
                                    <label class="star-2" for="star-7"></label>
                                    <input type="radio" value="3" @if(round($product->med_rate) == 3) checked="checked"   @endif name="cover_rate" class="star-3"
                                        id="star-8">
                                    <label class="star-3" for="star-8"></label>
                                    <input type="radio" value="2" @if(round($product->med_rate) == 2) checked="checked"   @endif name="cover_rate" class="star-4"
                                        id="star-9">
                                    <label class="star-4" for="star-9"></label>
                                    <input type="radio" value="1" @if(round($product->med_rate) == 1) checked="checked"   @endif name="cover_rate" class="star-5"
                                        id="star-10">
                                    <label class="star-5" for="star-10"></label>
                                    <span></span>
                                </div>
                                <h4 class="mb-4 "> بناءا علي {{$product->number_of_rates}} تقييم</h4>


                        </div>
                       <div class="col-md-7">
                           <div class="row">
                               <div class="col-md-2"><span>5</span> <i class="fa fa-star" aria-hidden="true"></i>
                               </div>
                               <div class="col-md-8"> <div class="progress">
                                <div class="progress-bar" style="width: @if($product->rating5) {{ (( $product->rating5->total / $product->number_of_rates ) * 100) }}@else 0 @endif%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                            <div class="col-md-2">({{$product->rating5->total}})</div>


                           </div>
                           <div class="row">
                            <div class="col-md-2"><span>4</span> <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-8"> <div class="progress">
                             <div class="progress-bar" style="width: @if($product->rating4) {{ (( $product->rating4->total / $product->number_of_rates ) * 100) }}@else 0 @endif%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                         </div>
                         <div class="col-md-2">({{$product->rating4->total}})</div>


                        </div>
                        <div class="row">
                            <div class="col-md-2"><span>3</span> <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-8"> <div class="progress">
                             <div class="progress-bar" style="width: @if($product->rating3) {{ (( $product->rating3->total / $product->number_of_rates ) * 100) }}@else 0 @endif%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                         </div>
                         <div class="col-md-2">({{$product->rating3->total}})</div>


                        </div>
                        <div class="row">
                            <div class="col-md-2"><span>2</span> <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-8"> <div class="progress">
                             <div class="progress-bar" style="width: @if($product->rating2) {{ (( $product->rating2->total / $product->number_of_rates ) * 100) }}@else 0 @endif%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                         </div>
                         <div class="col-md-2">({{$product->rating2->total}})</div>


                        </div>
                        <div class="row">
                            <div class="col-md-2"><span>1</span> <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-8"> <div class="progress">
                             <div class="progress-bar" style="width: @if($product->rating1) {{ (( $product->rating1->total / $product->number_of_rates ) * 100) }}@else 0 @endif%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                         </div>
                         <div class="col-md-2">({{$product->rating1->total}})</div>


                        </div>
                       </div>
                    </div>
                </div>

            </div>
@if($products)
            <div class="home-layout-4 home-layout">
                <div class="container">
                    <div class="clearfix">
                        <div class="head-title float-start">
                            <h2>منتجات متشابهة</h2>
                        </div>
                        <div class="float-end">
                            <a href="" class=""> عرض الكل</a>
                        </div>
                    </div>
                    <div class="owl-carousel owl-theme owl-carousel-classic">
                        @foreach ($products as $productD)
                    <div class="item">
                        <div class="h-section-4 mb-3">
                            <div class="image " style="position: relative">
                                <a href="{{route('product',['id'=>$productD->id])}}"><img src="{{'/uploads/products/'.$productD->image}}"></a>
                                <a href="{{route('product',['id'=>$productD->id])}}" class="btn"><img src="{{URL::to('/')}}/img/icons/text-file.png" alt="file"> التفاصيل </a>
                                    <span class="topright">جديد</span>
                            </div>
                            <div class="flex-container">
                                <div class="text">
                                    <h5><a href="{{route('product',['id'=>$productD->id])}}">{{$productD->product_name}}</a></h5>
                                    <p>{{ $productD->short_desc }}</p>
                                </div>
                                <div class="price"> ريال
                                    <p>{{$productD->price}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="quantity mb-3">
                            <label class="float-right">الكمية</label>
                            <input class="cart_q{{$productD->id}} number" type="number" value="1" min="1">
                        </div>
                        <div class="buttons mb-3">
                            <a href="{{route('product',['id'=>$productD->id])}}"><img src="{{URL::to('/img/icons/share.png')}}"></a>
                            <div class="pretty-checkbox">
                                <div class="pretty p-icon p-toggle p-plain">
                                    <input type="checkbox"  onclick="wishlist.add({{$productD->id}}, 1 , 0)" />
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
                            <a href="javascript:void(0)" @if(App\Http\Controllers\StoreController::checkIfInCart($productD->id)) style="background-color: #ffd761" @endif onclick="cart.add({{$productD->id}}, $('.cart_q{{$productD->id}}').val() , 0)" class="btn add-to-cart">
                                <img src="{{URL::to('/img/icons/cart-sm.png')}}">
                                <span>@if(App\Http\Controllers\StoreController::checkIfInCart($productD->id)) تمت اضافته الي السلة @else أضف إلى السلة @endif</span>
                            </a>
                        </div>
                    </div>
    @endforeach
                </div>
            </div>
        </div>
        <!--End-->
        @endif

        </div>

    </div>
     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content px-5">
                <div class="modal-header">
                    <h5 class="modal-title pink-color bold" id="exampleModalLabel">قيم الخدمة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route("add_product_review",["id"=>$product->product_id])}}" method="post">
@csrf
                <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <h3>قيم المنتج</h3>
                            </div>
                            <div class="col-md-8">
                                <div class="rating">
                                    <input type="radio" value="5" name="rating" class="star-1" id="star-1">
                                    <label class="star-1" for="star-1"></label>
                                    <input type="radio" value="4" name="rating" class="star-2" id="star-2">
                                    <label class="star-2" for="star-2"></label>
                                    <input type="radio" value="3" name="rating" class="star-3" id="star-3">
                                    <label class="star-3" for="star-3"></label>
                                    <input type="radio" value="2" name="rating" class="star-4" id="star-4">
                                    <label class="star-4" for="star-4"></label>
                                    <input type="radio" value="1" name="rating" class="star-5" id="star-5">
                                    <label class="star-5" for="star-5"></label>
                                    <span></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="pink-color mb-3 h3">اخبرنا إذا كان لديك ملاحظات </label>
                            <textarea class="form-control" name="notes" rows="6" placeholder="اكتب ملاحظاتك هنا "></textarea>
                        </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="submit" class="btn main-btn btn-md">تأكيد التقييم </button>
                </div>
            </form>

            </div>
        </div>
    </div>
@endsection
