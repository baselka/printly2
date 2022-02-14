@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

          </div>

          <div class="text-center">


        <div class="card">




            <div class="card-content">
                <div class="card-body">
                    @if(auth()->user()->id = $chat->creator)
<h1>           {{App\Http\Controllers\ProfileController::get_user_info($chat->rec)->name}}
</h1>
@else
<h1>           {{App\Http\Controllers\ProfileController::get_user_info($chat->creator)->name}}
</h1>
@endif
                    @foreach($message as $m)
					@if($m->user_id == auth()->user()->id)
					<p style="text-align:left; ">{{$m->message}}</p>
                    @if($m->has_file == 1)<p style="text-align:left;padding:20px "><a target="_blank" href="{{URL::to('/').'/uploads/employer_chat/'.$m->file}}">{{$m->file}}</a></p>@endif

				@else
                <span style="text-align:right; ">{{App\Http\Controllers\ProfileController::get_user_info($m->user_id)->name}}</span>
										<h3 style="text-align:right; " >{{$m->message}}</h3>
                                        @if($m->has_file == 1)<p style="text-align:right;padding:20px "><a target="_blank" href="{{URL::to('/').'/uploads/employer_chat/'.$m->file}}">{{$m->file}}</a></p>@endif

				@endif

					@endforeach
                    <div class="col-lg-12" >
                        <form action="{{route('send_employer_message',['id'=>$chat->id])}}" method="post" enctype="multipart/form-data">
                               @csrf
                            <div class="row">
                                <div class="col-md-6">
                            <div class="form-group">
                                <textarea placeholder="{{__('public.message')}}" class="form-control" required name="message"></textarea>
                            </div>
                             </div>

                          <div class="col-md-3">

                            <div class="form-group">

                                  <div class="custom-file">
                                <input type="file" class="custom-file-input" accept=
                                "application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                                text/plain, application/pdf, image/*" name="file" />
                                 <label class="custom-file-label">{{__('public.file')}}</label>
                            </div>
                              </div>
                        </div>
                          <div class="col-md-3">

                         <div class="col-md-3" >
                            <input type="submit" class="btn btn-success" value="{{__('public.send')}}" />
                        </div>
                         </div>
                        </div>
                        </form>
                       </div>

                </div>
            </div>
        </div>
   </div>
@endsection
