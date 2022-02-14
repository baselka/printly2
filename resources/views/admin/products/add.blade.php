@extends('layouts.admin')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">{{ __('public.products') }}</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">{{ __('public.home') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('products') }}">{{ __('public.products') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="{{ route('add-product') }}">{{ __('public.add') }}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card">


            @if (session()->has('success'))
                <script>
                    $(document).ready(function() {

                        Swal.fire(
                            '{{ __('public.good_job') }}',
                            "{{ session()->get('success') }}",
                            'success'
                        );
                    });
                </script>

            @endif
            @if (session()->has('error') || $errors->any())
                {{-- @dd($errors); --}}
                <script>
                    $(document).ready(function() {
                        Swal.fire(
                            '{{ __('public.faild_job_job') }}',

                            "",
                            'error'
                        );
                    });
                </script>
            @endif


            <div class="card-content">
                <div class="card-body">
                    <form method="POST" action="{{ route('add-product') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('public.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="short_desc" class="col-md-4 col-form-label text-md-right">التفاصيل القصيرة</label>

                            <div class="col-md-6">
                                <input id="short_desc" type="text"
                                    class="form-control @error('short_desc') is-invalid @enderror" name="short_desc"
                                    value="{{ old('short_desc') }}" required autocomplete="short_desc" autofocus>

                                @error('short_desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right"> الكود</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror"
                                    name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right"> رابط درايف</label>

                            <div class="col-md-6">
                                <input id="drive_url" type="text"
                                    class="form-control @error('drive_url') is-invalid @enderror" name="drive_url"
                                    value="{{ old('drive_url') }}" required autocomplete="drive_url" autofocus>

                                @error('drive_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price"
                                class="col-md-4 col-form-label text-md-right">{{ __('public.price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror"
                                    name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cost_price" class="col-md-4 col-form-label text-md-right">سعر التكلفة</label>

                            <div class="col-md-6">
                                <input id="cost_price" type="text"
                                    class="form-control @error('cost_price') is-invalid @enderror" name="cost_price"
                                    value="{{ old('cost_price') }}" required autocomplete="cost_price" autofocus>

                                @error('cost_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="publisher_price" class="col-md-4 col-form-label text-md-right">سعر الناشر</label>

                            <div class="col-md-6">
                                <input id="publisher_price" type="text"
                                    class="form-control @error('publisher_price') is-invalid @enderror"
                                    name="publisher_price" value="{{ old('publisher_price') }}" required
                                    autocomplete="publisher_price" autofocus>

                                @error('publisher_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">اسم المؤلف</label>

                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control @error('author') is-invalid @enderror"
                                    name="author" value="{{ old('author') }}" required autocomplete="author" autofocus>

                                @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price"
                                class="col-md-4 col-form-label text-md-right">{{ __('public.desc') }}</label>

                            <div class="col-md-6">
                                <textarea id="desc" type="text" class="form-control @error('desc') is-invalid @enderror"
                                    name="desc" required autocomplete="price" autofocus></textarea>

                                @error('desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">الناشرين</label>


                            <div class="col-md-6">

                                <select class="select2 form-control" name="publisher">
                                    <optgroup label="الناشرين">


                                        @foreach ($publishers as $publisher)
                                            <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>

                                @error('publisher')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('public.categories') }}</label>


                            <div class="col-md-6">

                                <select class="select2 form-control" name="categories">
                                    <optgroup label="{{ __('public.categories') }}">


                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>

                                @error('categories')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('public.photo') }}</label>


                            <div class="col-md-6">

                                <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror"
                                    name="photo" required autocomplete="off" autofocus>


                                @error('categories')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo"
                                class="col-md-4 col-form-label text-md-right">{{ __('public.photo') }}</label>

                            <div class="box-tools ">
                                {{-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> --}}
                                <button type="button" onclick="addChoice();" data-toggle="tooltip" title=""
                                    class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
                            </div>


                            <div class="col-md-6 ">
                                <table class="table">
                                    <tbody class="images_box">

                                    </tbody>
                                </table>


                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if ($admin)
                            <div class="form-group row">
                                <label for="accepted" class="col-md-4 col-form-label text-md-right">حالة المنتج</label>


                                <div class="col-md-6">

                                    <select class="select2 form-control" name="accepted">
                                        <optgroup label="حالة المنتج">


                                            <option value="1">قبول المنتج</option>

                                            <option value="0">عدم قبول المنتج</option>
                                        </optgroup>
                                    </select>

                                    @error('accepted')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @endif
                        <input type="hidden" value="{{ $type }}" name="type" />
                        {{-- @if ($type == 1) --}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('public.covers') }}

                                <button type="button" onclick="addCover();" data-toggle="tooltip" title=""
                                    class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>

                            </label>


                            <div class="col-md-6">
                                <table class="table table-borderd">
                                    <thead>
                                        <th>التغليف</th>
                                        <th>السعر </th>
                                    </thead>
                                    <tbody class="covers">

                                    </tbody>
                                </table>


                                @error('covers')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('public.printer_color') }}</label>
                            <button type="button" onclick="addPrinterColor();" data-toggle="tooltip" title=""
                                class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>


                            <div class="col-md-6">
                                <table class="table table-borderd">
                                    <thead>
                                        <th>اللون</th>
                                        <th>السعر </th>
                                    </thead>
                                    <tbody class="printer_color">

                                    </tbody>
                                </table>



                                @error('printer_color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>
                        {{-- @endif --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('public.add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
    <script>
        var image_row = 1;

        function addChoice() {

            if ($("#price_type:checked").val() != 1) {
                $('.images_box').append('<tr id="image-row' + image_row +
                    '"> <td><input id="photo" onchange="readURL('+this+','+image_row+')" type="file" class="form-control " name="imgs[]" required autocomplete="off" autofocus> <img id="imgPreview'+image_row+'" src="#" alt="your image" />' +
                    '</td>' +

                    '<td><button type="button" onclick="removed(' + image_row +
                    ')" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-minus-circle"></i></button></td>' +
                    '</tr>');

                image_row++;
            }
        }

        function removed(num) {
            if ($("#price_type:checked").val() != 1) {
                if ($('#image-row' + num).remove()) {
                    image_row = image_row - 1;

                }
            }
        }
        var image_row2 = 1;

        function addCover() {

            $('.covers').append('<tr id="cover-row' + image_row2 +
                '"> <td>  <select class="select2 form-control" name="covers[]"  >' +
                '<optgroup label="{{ __('public.covers') }}">' +
               ' @foreach ($covers as $cover)'+
                    '<option value="{{ $cover->id }}">{{ $cover->name }}</option>'+
                    '@endforeach' +
                '  </optgroup>' +
                ' </select>' +
                '</td>' +
                '<td>            <input type="number" name="cover_price[]" class="form-control" placeholder="السعر الأضافي"/></td>' +

                '<td><button type="button" onclick="removed_cover(' + image_row2 +
                ')" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-minus-circle"></i></button></td>' +
                '</tr>');

            image_row2++;

        }

        var image_row3 = 1;

        function addPrinterColor() {

            $('.printer_color').append('<tr id="printer-row' + image_row3 +
                '"> <td>  <select class="select2 form-control" name="printer_color[]"  >' +
                '<optgroup label="{{ __('public.covers') }}">' +
               ' @foreach ($printer_color as $printer)'+
                    '<option value="{{ $printer->id }}">{{ $printer->name }}</option>'+
                    '@endforeach' +
                '  </optgroup>' +
                ' </select>' +
                '</td>' +
                '<td>            <input type="number" name="printer_color_price[]" placeholder="السعر الأضافي" class="form-control" /></td>' +

                '<td><button type="button" onclick="removed_printer(' + image_row2 +
                ')" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-minus-circle"></i></button></td>' +
                '</tr>');

            image_row3++;

        }

        function removed_printer(num) {
            if ($('#printer-row' + num).remove()) {
                image_row3 = image_row3 - 1;


            }
        }

        function removed_cover(num) {
            if ($('#cover-row' + num).remove()) {
                image_row2 = image_row2 - 1;


            }
        }

        addChoice();
        addCover();
        addPrinterColor();




    </script>
    <script>
             function readURL(id) {
                const file = this.files[0];
        console.log(file);
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $('#imgPreview').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
    }
    </script>
@endsection

