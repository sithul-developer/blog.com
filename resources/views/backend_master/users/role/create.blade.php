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
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-0 pt-3">
                    <div class="card-body">
                        <form class="row g-3 needs-validation" action="{{ url('/panel/dashboard/role/store') }}" method="POST"
                            novalidate enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-12">
                                <label for="NameRole" class="form-label">Name Role <span
                                        class="text-danger ">*</span></label>
                                <input type="text" value="{{-- {{ $permission->name }}" --}}" name="name" id="name"
                                    placeholder="Please input role"
                                    class="form-control @error('role') is-invalid @enderror has-validation " required>

                                @if ($errors->has('name'))
                                    <div class="text-danger text-left " style="font-size:14px">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <label for="NameRole" class="form-label">Permission <span class="text-danger ">*</span></label>

                            <div class="row my-2">
                                @foreach ($permissions as $permission)
                                    <div class="col-3 form-check">
                                        <input type="checkbox" id="gridCheck1" class="form-checkbox text-blue-600"
                                            name="permission[]" value="{{ $permission->id }}" <label
                                            class="form-check-label  " for="gridCheck1">
                                            <span style="font-size: 16px">
                                                {{ $permission->name }}

                                            </span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="modal-footer">
                                <div class="text-left">
                                    <button type="submit" class="btn btn-secondary  btn-sm"><a
                                            href="{{ url('panel/dashboard/role') }}" style="color:whitesmoke "><i
                                                class="bi bi-arrow-clockwise" style="margin-right: 10px "
                                                class="spinner-border"></i>Back To Lists </a></button>
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

   
@endsection
