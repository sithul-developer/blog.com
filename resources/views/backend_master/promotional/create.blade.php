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
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row g-3 needs-validation">
            <div class="col-lg-12">
                <div class="card pt-4">
                    <div class="card-body pb-2" style="overflow-x:auto;">
                        <form action="{{ url('/panel/dashboard/promotional/store/') }}" method="POST" class="row g-3 "
                            style="padding-top: 10px;" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row pt-4">
                                <div class="col-7">
                                    <div class="col-12">
                                        <div class="cards">
                                            <label for="NameCategory" class="form-label">Title <span
                                                    class="text-danger ">*</span></label>
                                            <input type="text" value="" name="title" id="title"
                                                placeholder="" class="form-control  ">
                                            @if ($errors->has('title'))
                                                <div class=" text-danger text-left " style="font-size:14px">
                                                    {{ $errors->first('title') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 pt-3 ">
                                        <label for="NameCategory" class="form-label">Options<span
                                                class="text-danger ">*</span></label>
                                        <select class="form-select" aria-label="Default select example" id="options"
                                            name="options">
                                            <option selected="" disabled="" value=""><span
                                                    style="font-size:14px">Selete
                                                    option</p>
                                            </option>
                                            <option value="0"> 1- Slider</option>
                                            <option value="1"> 2- Footer</option>
                                            <option value="2"> 3- Promotional</option>
                                        </select>
                                        @if ($errors->has('options'))
                                            <div class="text-danger text-left " style="font-size:14px">
                                                {{ $errors->first('options') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-12 pt-3">
                                        <label for="NameCategory" class="form-label">Order<span
                                                class="text-danger ">*</span></label>
                                        <select class="form-select" aria-label="Default select example" id="order"
                                            name="order">
                                            <option selected="" disabled="" value=""><span
                                                    style="font-size:14px">Selete
                                                    order</p>
                                            </option>
                                            <option value="0"> 1- Top</option>
                                            <option value="1"> 2- Center</option>
                                            <option value="2"> 3- Buttom </option>
                                            <option value="3"> 4- Empty Order </option>
                                        </select>
                                        <p style="margin-top: 0;
                                        margin-bottom: 1rem;
                                        font-size: 13px;
                                        padding: 5px 0 0 0;
                                        color: red;">Noted: If you select slider or footer you must to select 4-Empty Order  </p>
                                        @if ($errors->has('order'))
                                            <div class="text-danger text-left " style="font-size:14px">
                                                {{ $errors->first('order') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="col-12 pt-3">
                                        <input type ="file" class = "visually-hidden" name="image" id="upload-input">
                                        <label for="NameCategory" class="form-label">Photo <span
                                                class="text-danger ">*</span></label>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-grid gap-2 pt-3 ">
                                                    <button type="button" class="upload-btn mb-3 btn btn-primary"
                                                        id="filebutton"><span
                                                            style="display: flex;
                                                                            justify-content: center;
                                                                            align-items: center;">
                                                            <i class="bx bxs-cloud-download "
                                                                style="font-size:25px"></i><span
                                                                style="font-size: 16px ;padding-left: 5px;   font-family: Krasar, sans-serif;">
                                                                Choose File</span>

                                                </div>

                                                <div class ="upload-wrapper pt-2">
                                                    <div class = "upload-container">
                                                        <div class = "upload-img">

                                                            <img id="preview" class="w-100" src=""
                                                                alt="image" class="pt-1" style="font-size: 14px;" />
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
                                    <div class="modal-footer">
                                        <div class="text-left d-flex">
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                style="margin-right: 10px ; " data-bs-dismiss="modal"> <a
                                                    href="{{ route('promotional.index') }}"
                                                    style="margin-right: 10px ;color:whitesmoke "><i
                                                        class="bi bi-arrow-clockwise"
                                                        style="margin-right: 10px ;color:whitesmoke "
                                                        class="spinner-border"></i> Back To List
                                                </a></button>
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-save "a
                                                    style="margin-right: 10px "></i>Save</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
       
    </section>
{{--     <script src="{{ url('./assets/js/jquery.min.js') }}"></script> --}}
@endsection
