@extends('backend_master.index')
@section('content')
    <section class="section profile">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit"
                                    aria-selected="true" role="tab" style="font-size:16px">Edit Profile</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            <!-- Profile Edit Form -->
                            <form class="pt-4">
                                @foreach ($profile as $item)
                                @endforeach
                                <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3" style="font-size: 14px">Profile
                                        Image</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type = "file" class = "visually-hidden" name="image" id ="upload-file">
                                        <div class = "upload-profile">
                                            <img id="blah" class="text-sm"
                                                src="{{ asset('https://bvm-admin-staging.codingate.com/img/no-user.jpg') }}"
                                                alt="image"
                                                style="
                                                    font-size:14px height: 100px;
                                                    aspect-ratio: auto 70 / 70;
                                                    width: 100px; " />
                                        </div>
                                        <div class="pt-2">
                                            <a href="#" class="btn btn-primary btn-sm upload-btn "
                                                title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm"
                                                title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3" style="font-size: 14px">Full
                                        Name</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="fullName" type="text" class="form-control" id="fullName"
                                            value="{{ $profile->name }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="company" class="col-md-4 col-lg-3 " style="font-size: 14px">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="company" type="text" class="form-control" id="company"
                                            value="{{ $profile->email }}">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                                </div>
                            </form>
                            <!-- End Profile Edit Form -->
                        </div>
                    </div>
                </div>
                <!-- Change Password Form -->
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-bordered " role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit"
                                    aria-selected="true" role="tab" style="font-size:16px"> Change Password</button>
                            </li>
                        </ul>
                        <form action="{{ route('profile.change_password') }}" method="POST" class="pt-4">
                            @csrf
                            <div class="row mb-3">
                                <label for="currentPassword" class="col-md-4 col-lg-3" style="font-size: 14px">Current
                                    Password</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="old_password" type="password" class="form-control" id="old_password">
                                    @if ($errors->has('old_password'))
                                        <div class="text-danger text-left " style="font-size:14px">
                                            {{ $errors->first('old_password') }}
                                        </div>
                                    @endif
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="newPassword" class="col-md-4 col-lg-3 " style="font-size: 14px">New
                                    Password</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="new_password" id="new_password" name="new_password" type="password"
                                        class="form-control" id="new_password">
                                    @if ($errors->has('new_password'))
                                        <div class="text-danger text-left " style="font-size:14px">
                                            {{ $errors->first('new_password') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="new_password_confirmation" class="col-md-4 col-lg-3 col-form-label"
                                    style="font-size: 14px">Re-enter
                                    New
                                    Password</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="new_password_confirmation" id="new_password_confirmation"
                                        name="new_password_confirmation" type="password" class="form-control"
                                        id="re_new_password">
                                        @if ($errors->has('new_password_confirmation'))
                                        <div class="text-danger text-left " style="font-size:14px">
                                            {{ $errors->first('new_password_confirmation') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-sm">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Change Password Form -->
            </div>
        </div>
    </section>
    <style>


    </style>
@endsection

<script>
    $(document).ready(function() {
        $('.upload-container').add('.upload-btn').click(function() {
            $('#upload-input').trigger('click');
        });

        $('#upload-input').change(event => {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadend = () => {
                $('.upload-text').text(file.name);
                $('.upload-img img').attr('aria-label', file.name);
                $('.upload-img img').attr('src', reader.result);

            }
        })

    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
