@extends('backend_master.index')
@section('content')
    <section class="section profile">
        <div class="row">
            <div class="col-xl-8">
                <div class="pagetitle">
                    <h1>Profile</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item">Users</li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </nav>
                </div>
                <div class="card">
                    <div class="card-body ">
                        <div class="tab-content">
                            <!-- Profile Edit Form -->
                            <form class="pt-4" action="{{ url('/panel/dashboard/setting/store') }}" method="POST"
                                class="row g-3 " enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row mb-3">
                                    <div class="col-md-8">
                                        <label for="profileImage" class="col-md-4 "
                                            style="font-size: 16px;
                                        margin-bottom: 10px;">Logo
                                        </label>
                                        <input type = "file" class = "visually-hidden" name="logo" id ="upload-logo">



                                        <div class = "upload-imageLogo "
                                            style="
                                        font-size:13px ;
                                        height: 100px;
                                        object-fit: contain;
                                        aspect-ratio: auto 70 / 70;
                                        width: 100px; ">



                                            <style>
                                                .hidden-icon {
                                                    display: none;
                                                    position: absolute;
                                                    padding: 0 -8px 24px 0;
                                                    left: 20px;
                                                    background: #ffb700;
                                                    /* width: 100px; */
                                                    font-size: 18px;
                                                    /* display: flex; */

                                                }

                                                .hover-button:hover .hidden-icon {
                                                    display: inline-block;
                                                    /* Or any appropriate display value */
                                                }
                                            </style>

                                            @foreach ($setting as $item)
                                                @if (!empty($item))
                                                    <div class="hover-button">
                                                        <img id="blah" class="text-sm upload-btn"
                                                            src="{{ $item->getLogo() }}" alt="image"
                                                            style="
                                    font-size:13px ;
                                    height: 100px;
                                    aspect-ratio: auto 70 / 70;
                                    width: 100px; 
                                    font-weight: 600;" />

                                                        <span class="hidden-icon "><i class="bi bi-pencil-square"
                                                                style="margin: 10px " class="spinner-border"></i></span>

                                                    </div>
                                                @else
                                                    <img id="blah" class="text-sm upload-btn"
                                                        src="{{ asset('https://bvm-admin-staging.codingate.com/img/no-image.png') }}"
                                                        alt="image"
                                                        style="
                                    font-size:13px ;
                                    height: 100px;
                                    aspect-ratio: auto 70 / 70;
                                    width: 100px; 
                                    font-weight: 600;" />
                                                @endif
                                            @endforeach



                                        </div>
                                        <div
                                            style="font-size:13px; color:dimgray;padding-top: 5px ;font-family: Krasar, sans-serif;
                                            font-weight: 600;">
                                            <span> Maximum Size: 1 MB</span><br>
                                            <span>Dimensions: W: 100 * H: 100</span>
                                        </div>
                                        @if ($errors->has('logo'))
                                            <div class="text-danger text-left " style="font-size:14px">
                                                {{ $errors->first('logo') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-8 ">
                                        <label for="profileImage"
                                            style="font-size: 16px;
                                        margin-bottom: 10px;">Favicon
                                        </label>
                                        <input type = "file" class = "visually-hidden" name="favaicon"
                                            id="upload-Favaicon">
                                        <div class = "upload-imageFavaicon">
                                            @foreach ($setting as $item)
                                                @if (!empty($item))
                                                    <div class="hover-button">
                                                        <img id="preview" class="text-sm upload-logo"
                                                            src="{{ $item->getFavaicon() }}" alt="image"
                                                            style="
                                                    font-size:13p;
                                                     height: 32px;
                                                    aspect-ratio: auto 70 / 70;
                                                    width: 32px;
                                                     " />

                                                        <span class="hidden-icon "><i class="bi bi-pencil-square"
                                                                style="margin: 10px " class="spinner-border"></i></span>
                                                    </div>
                                                @else
                                                    <img id="preview" class="text-sm upload-logo"
                                                        src="{{ asset('https://bvm-admin-staging.codingate.com/img/no-image.png') }}"
                                                        alt="image"
                                                        style="
                                                font-size:13p;
                                                 height: 32px;
                                                aspect-ratio: auto 70 / 70;
                                                width: 32px;
                                                 " />
                                                @endif
                                            @endforeach

                                            <div
                                                style="font-size:14px; color:dimgray; padding-top: 5px;  font-family: Krasar, sans-serif;
                                                font-weight: 600;">
                                                <span> Maximum Size: 1 MB</span><br>
                                                <span>Dimensions: W: 32 * H: 32</span>
                                            </div>
                                            @if ($errors->has('favaicon'))
                                                <div class="text-danger text-left " style="font-size:14px">
                                                    {{ $errors->first('favaicon') }}
                                                </div>
                                            @endif
                                        </div>

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

            </div>
        </div>
    </section>
@endsection
