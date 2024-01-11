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
                                            href="{{ url('panel/dashboard/course_category') }}" style="color:whitesmoke "><i
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#btn_dalete ', function() {
                var users_id = $(this).val();
                /*   alert(category_id) */
                $('#deletetModal').modal('show')
                $('#delete_id').val(users_id);
            });
        });


        $(document).ready(function() {
            $(document).on('click', '#btn_store ', function() {
                $('#store_Modal').modal('show')
            });
        });

        $(document).ready(function() {
            $(document).on('click', '#btn_show ', function() {
                var users_id = $(this).val();
                /*   alert(category_id) */
                $('#Show_Modal').modal('show')
                $('#update_id').val(users_id);
            });
        });
    </script>

    <style>
        th {
            font-size: 0.90rem;
            font-family: Krasar, sans-serif;
        }

        td {
            font-size: 0.85rem;
            font-family: Krasar, sans-serif;
        }

        .form-label {
            font-family: Krasar, sans-serif;
            font-size: 15px;
            margin-bottom: 2px;
        }

        .form-control {
            padding: .575rem .75rem;
            font-size: 0.85rem;

        }

        .form-select {

            padding: .575rem 2.25rem 0.585rem .75rem;
            font-size: 0.85rem;

        }
    </style>
@endsection
