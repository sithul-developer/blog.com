@extends('backend_master.index')
@section('content')
    <div class="pagetitle">
        <h1>Form Layouts</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Layouts</li>
            </ol>
        </nav>

    </div>
    <!-- End Page Title -->
    <section class="section ">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="card ">
                    <div class="card-body mt-5">
                        <form action="{{ url('/panel/dashboard/posts/store') }}" method="POST" class="row g-3 "
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-8">
                                    <div class="col-12">
                                        <label class="form-label">Title <span class="text-danger ">*</span></label>
                                        <input type="text" value="{{ old('title') }}" name="title" id="title"
                                            placeholder="" class="form-control ">
                                        @if ($errors->has('title'))
                                            <div class="text-danger text-left " style="font-size:14px">
                                                {{ $errors->first('title') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-12 pt-2">
                                        <label for="NameCategory" class="form-label">Sub_Title<span
                                                class="text-danger ">*</span></label>
                                        <input type="text" value="{{ old('sub_title') }}" name="sub_title" id="sub_title"
                                            placeholder="" class="form-control">
                                        @if ($errors->has('sub_title'))
                                            <div class="text-danger text-left " style="font-size:14px">
                                                {{ $errors->first('sub_title') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-12 pt-2">
                                        <label for="NameCategory" class="form-label">Category<span
                                                class="text-danger ">*</span></label>

                                        <select class="form-select " readonly name="category_id" id="validationCustom04">
                                            <option selected="" disabled="" value=""> </option>
                                            @foreach ($categories as $item)
                                                <option value='{{ $item->id }}'>
                                                    {{ $item->name }} </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('category_id'))
                                            <div class="text-danger text-left " style="font-size:14px">
                                                {{ $errors->first('category_id') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-12 pt-2">
                                        <label for="validationCustom04" class="form-label">Description <span
                                                class="text-danger">*</span></label>
                                        <textarea value="{{ old('description') }}" name="description" id="description" placeholder="" class="form-control  "></textarea>
                                        @if ($errors->has('description'))
                                            <div class="text-danger text-left " style="font-size:14px">
                                                {{ $errors->first('description') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="col-12">
                                        <label for="NameCategory" class="form-label">Photo <span
                                                class="text-danger ">*</span></label>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-grid gap-2 mt-4">
                                                    <button class=" upload-btn mb-3 btn btn-primary" type="button"
                                                        style="display: flex;
                                                        justify-content: center;
                                                        align-items: center;">
                                                        <i class="bx bxs-cloud-download " style="font-size:25px"></i>
                                                        <span style="font-size: 15px">Choose File</span></button>
                                                        
                                                </div>
                                                <input type = "file" class ="visually-hidden" name="image"
                                                    id ="upload-input">
                                                <div class ="upload-wrapper pb-2">
                                                    <div class = "upload-container">
                                                        <div class = "upload-img">
                                                            <img id="blah" class="text-sm"
                                                                src="{{ asset('./media/image slider.png') }}"
                                                                alt="image" style="font-size:14px  " />
                                                            <i class=" " style="font-size:25px"></i>
                                                        </div>
                                                        <p class = "upload-text"></p>
                                                    </div>
                                                </div>
                                                @if ($errors->has('image'))
                                                    <div class="text-danger text-left " style="font-size:14px">
                                                        {{ $errors->first('image') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="cards">
                                    <label for="NameCategory" class="form-label">Content <span
                                            class="text-danger ">*</span></label>
                                    <textarea id="editor" name="content" enctype="multipart/form-data"></textarea>
                                    @if ($errors->has('content'))
                                        <div class="text-danger text-left " style="font-size:14px">
                                            {{ $errors->first('content') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="text-left d-flex">
                                    <button class="btn btn-secondary  btn-sm mx-2"><a href="{{ route('posts.index') }}"
                                            style="color:whitesmoke "><i class="bi bi-arrow-clockwise"
                                                style="margin-right: 10px " class="spinner-border"></i>Back To Lists
                                        </a></button>
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-save "a
                                            style="margin-right: 10px "></i>Save</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </section>
  {{--   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
 --}}
@endsection
