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
    </div> <!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-7">
                <div class="card m-0 pt-3">
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST" class="row g-3 needs-validation"
                            novalidate>
                            {{ csrf_field() }}
                            <div class="col-12">
                                <label for="NameCategory" class="form-label">Category<span
                                        class="text-danger ">*</span></label>
                                <input type="text" value="{{ old('name') }}" name="name" id="name"
                                    placeholder=" Category"
                                    class="form-control @error('name') is-invalid @enderror has-validation " required>

                                @if ($errors->has('name'))
                                    <div class="text-danger text-left " style="font-size:14px">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 pt-1">
                                <label for="validationCustom04" class="form-label">Description <span
                                        class="text-danger">*</span></label>
                                <textarea value="{{ old('description') }}" name="description" id="description" placeholder="Description"
                                    class="form-control @error('description') is-invalid @enderror has-validation " style="height: 100px" required></textarea>
                            </div>
                            @if ($errors->has('description'))
                                <div class="text-danger text-left " style="font-size:14px">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <div class="modal-footer">
                                <div class="text-left d-flex pt-3">
                                    <button type="submit" class="btn btn-secondary  btn-sm mx-4"><a
                                            href="{{ url('panel/dashboard/category') }}" style="color:whitesmoke "><i
                                                class="bi bi-arrow-clockwise" class="spinner-border"></i>Back To Lists
                                        </a></button>
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-save "
                                            style="margin-right: 10px "></i>Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection
