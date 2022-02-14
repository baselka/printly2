@extends('layouts.app')

@section('content')


        </header>
        <!--End-->


        <div class="page-content">
            <div class="container">
                <h2 class="text-center h1">الأسئلة الشائعة</h2>
                <div class="pink-layout text-center">
                  <div class="accordion" id="accordionExample">
                      @foreach($faqs as $faq)
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$faq->id}}" aria-expanded="true" aria-controls="collapseOne">
        {{$faq->question}}
      </button>
    </h2>
    <div id="collapseOne{{$faq->id}}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>{{$faq->answer}}
      </div>
    </div>
  </div>
@endforeach

</div>
                </div>
            </div>
        </div>    

		<!--end-->
 @endsection

