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
            <div class="col-lg-6">
                <div class="card m-0 pt-3">
                    <div class="card-body">
                        <form class="row g-3 needs-validation" action="{{url('/panel/dashboard/users/store') }}" method="post"  novalidate>
                            {{ csrf_field() }}
                            <div class="col-12">
                                <label for="yourName" class="form-label">User Name <span
                                        class="text-danger ">*</span></label>

                                <input type="text" value="{{ old('name') }}" name="name" id="yourName"
                                    class="form-control @error('name') is-invalid @enderror " placeholder="User Name" required>


                                @if ($errors->has('name'))
                                    <div class="text-danger text-left" style="font-size:14px">
                                        {{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="col-12">
                                <label for="yourEmail" class="form-label">Email <span class="text-danger ">*</span></label>

                                <input type="email" value="{{ old('email') }}" name="email" id="yourEmail"
                                    class="form-control  @error('email') is-invalid @enderror has-validation " placeholder="Email" required>
                                @if ($errors->has('email'))
                                    <div class="text-danger text-left " style="font-size:14px">
                                        {{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" name="password" value="{{ old('password') }}" id="password"
                                    class="form-control  @error('password') is-invalid @enderror has-validation "
                                    id="yourPassword"  placeholder="password"  required>
                                @if ($errors->has('password'))
                                    <div class="text-danger text-left " style="font-size:14px">
                                        {{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="validationCustom04" class="form-label">Role <span
                                        class="text-danger">*</span></label>

                                <select class="form-select" name='role_name' value="{{ old('role_name') }}"
                                    id="validationCustom04" value="{{ old('role_name') }}" required>
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('role_name'))
                                    <div class="text-danger text-left " style="font-size:14px">
                                        {{ $errors->first('role_name') }}</div>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="validationCustom04" class="form-label">Choose User_Type <span
                                        class="text-danger">*</span></label>

                                <select class="form-select" name='user_type' value="{{ old('user_type') }}"
                                    id="validationCustom04" value="{{ old('role_name') }}" required>
                                    <option selected="" disabled="" value="">Choose...</option>
                                        <option value="0">admin</option>
                                        <option value="1">normal user</option>
                                </select>

                                @if ($errors->has('role_name'))
                                    <div class="text-danger text-left " style="font-size:14px">
                                        {{ $errors->first('role_name') }}</div>
                                @endif
                            </div>
                            <div class="modal-footer " style="border: 0px">
                                <div class="text-left">

                                    <button type="submit" class="btn btn-secondary  btn-sm"><a
                                            href="{{ url('/panel/dashboard/users') }}" style="color:whitesmoke "><i
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
